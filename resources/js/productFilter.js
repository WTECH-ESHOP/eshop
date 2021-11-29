import * as noUiSlider from 'nouislider';
import 'nouislider/dist/nouislider.css';

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const baseUrl = window.location.pathname.replace('/','');
const filterNames = ["category", "flavour", "volume", "brand"];
const filterParams = ["c", "f", "b"];

function getQueryItem(filterName) {
    let checkBoxes = document.getElementsByName(filterName);

    let queryArray = Array.prototype.slice.call(checkBoxes)
                    .filter(ch => ch.checked==true)
                    .map(ch => ch.id);
                    
    return queryArray;
}

function handleCheckBoxesInDOM() {
    filterParams.forEach(checkboxName => {
        if(urlParams.has(checkboxName)) {
            let valueNamesString = urlParams.get(checkboxName);
            let valueNames = valueNamesString.split(",");
    
            valueNames.forEach(element => {
                if(element) {
                    let checkbox = document.querySelector(`[id="${element}"]`);
                    checkbox.checked = true;
                }
            })
        }
    })
}

function addParamElemsToParentInDOM(paramItemsElementName) {
    const paramList = document.getElementById(paramItemsElementName);

    let queryValues = [];
    for(let key of urlParams.keys()) {
        if(['p','o','page'].includes(key)) continue;

        for(let value of urlParams.getAll(key)) {
            let valueNames = value.split(",");
            for(let valueName of valueNames) {
                if(valueName) {
                    queryValues.push(valueName);
                }
            }
        }
    }

    for(let queryValue of queryValues) {
        let queryKey;

        if(document.getElementById(queryValue)) {
            queryKey = document.getElementById(queryValue).getAttribute("param");
        }

        let firstParamItem = document.querySelector(".param-item");
        let newParamItem = firstParamItem.cloneNode(true);
        newParamItem.classList.remove("hidden");
        newParamItem.classList.add("flex");

        paramList.insertBefore(newParamItem, paramList.firstChild);
        let newParamItemText = newParamItem.querySelector(".param-item-text");
        newParamItemText.textContent = queryValue.replace(/_|-/g, ' ');
        let newParamItemRemoveIcon = newParamItem.querySelector(".remove-param");
        newParamItemRemoveIcon.setAttribute("value", queryValue);
        newParamItemRemoveIcon.setAttribute("key", queryKey);
    }
}

function filterResults() {
    let href = `${baseUrl}?`;

    filterNames.forEach(filterName => {
        let queryArray = getQueryItem(filterName);
        let queryParam = document.getElementsByName(filterName)[0].getAttribute("param");

        if(queryArray.length) href += `&${queryParam}=` + queryArray;
    })

    document.location.href=href;
}

function handleParamRemoving(removeParamClass) {
    let params = document.getElementsByClassName(removeParamClass);

    for(let elem of params) {
        elem.addEventListener("click", () => {
            elem.closest(".param-item").remove();

            let queryKey = elem.getAttribute("key");
            let queryValueToRemove = elem.getAttribute("value");
            
            let values = urlParams.getAll(queryKey);
            console.log(values, queryKey);
            let valueArray = values[0].split(",");
            let newValueArray = valueArray.filter((item) => item != queryValueToRemove);
            let newValue = newValueArray.join(",");

            urlParams.set(queryKey, newValue);
            if(!newValue) urlParams.delete(queryKey);

            if(!!urlParams.toString()) document.location.href = `${baseUrl}?` + urlParams;
            else document.location.href = baseUrl;
        })
    }
}

function handleFilterChange() {
    filterNames.forEach(filterName => {
        // console.log(filterName);
        document.getElementsByName(filterName).forEach(elem => {
            elem.addEventListener('change', () => {
                filterResults();
            });
        });
    })
}

function handleCancelOfParams(cancelElemID) {
    document.getElementById(cancelElemID).addEventListener("click", () => {
        document.location.href = baseUrl;
    });
}

function initializePriceSlider() {
    let handlesSlider = document.querySelector('#slider-handles');
    let min, max, initialMax;

    if(urlParams.has('p')) {
        let values = urlParams.get('p').split("-");
        min = +values[0];
        max = +values[1];
    } else {
        min = +handlesSlider.getAttribute('min');
        max = +handlesSlider.getAttribute('max');
    }

    initialMax = +handlesSlider.getAttribute('max');

    noUiSlider.create(handlesSlider, {
        start: [min, max],
        range: {
            'min': 0,
            'max': initialMax
        },
        step: 1
    });

    let nonLinearStepSliderValueElement = document.getElementById('slider-non-linear-step-value');

    handlesSlider.noUiSlider.on('update', function (values) {
        nonLinearStepSliderValueElement.querySelector('#price-min').textContent = `${(+values[0]).toFixed(0)} €`;
        nonLinearStepSliderValueElement.querySelector('#price-max').textContent = `${(+values[1]).toFixed(0)} €`;
    });
    handlesSlider.noUiSlider.on('change', function (values) {
        if(!urlParams.has("p")) urlParams.append("p", values.join('-'));
        else urlParams.set('p',  values.join('-'));
        
        console.log("price slider updated");
        if(!!urlParams.toString()) document.location.href = `${baseUrl}?` + urlParams;
        else document.location.href = baseUrl;
    });
}

function handleOrder() {
    let filterOrder = document.getElementById('filter-order');
    let param = urlParams.get('o');
    
    filterOrder.value = param || 'updated_at-desc';

    filterOrder.addEventListener('change', event => {
        urlParams.set('o', event.target.value);

        if(!!urlParams.toString()) document.location.href = `${baseUrl}?` + urlParams;
        else document.location.href = baseUrl;
    });

}

document.addEventListener("DOMContentLoaded", () => {
    if(!!document.querySelectorAll('.filter').length) {
        handleCheckBoxesInDOM();
        addParamElemsToParentInDOM("params-list");
        handleFilterChange();
        handleCancelOfParams("cancel-params");
        handleParamRemoving("remove-param");
        initializePriceSlider();
        handleOrder();
    }
});

