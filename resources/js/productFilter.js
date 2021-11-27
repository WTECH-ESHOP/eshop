const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const baseUrl = "proteins";
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
            // console.log(checkboxName);
            valueNamesString = urlParams.get(checkboxName);
            valueNames = valueNamesString.split(",");
    
            valueNames.forEach(element => {
                if(element) {
                    checkbox = document.querySelector(`[id="${element}"]`);
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
        let firstParamItem = document.querySelector(".param-item");
        let newParamItem = firstParamItem.cloneNode(true);
        newParamItem.classList.remove("hidden");
        newParamItem.classList.add("flex");

        paramList.insertBefore(newParamItem, paramList.firstChild);
        newParamItemText = newParamItem.querySelector(".param-item-text");
        newParamItemText.textContent = queryValue.replace(/_|-/g, ' ');
        newParamItemRemoveIcon = newParamItem.querySelector(".remove-param");
        newParamItemRemoveIcon.setAttribute("value", queryValue);
        queryKey = document.getElementById(queryValue).getAttribute("param");
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
    params = document.getElementsByClassName(removeParamClass);
    for(let elem of params) {
        elem.addEventListener("click", () => {
            elem.closest(".param-item").remove();

            let queryKey = elem.getAttribute("key");
            let queryValueToRemove = elem.getAttribute("value");
            
            let values = urlParams.getAll(queryKey);
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

document.addEventListener("DOMContentLoaded", () => {
    handleCheckBoxesInDOM();
    addParamElemsToParentInDOM("params-list");
    handleFilterChange();
    handleCancelOfParams("cancel-params");
    handleParamRemoving("remove-param");
});

