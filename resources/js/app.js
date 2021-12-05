require('./bootstrap')
require('./productFilter')
require('./modals')
require('./search')
require('./filePicker')


document.addEventListener('DOMContentLoaded', () => {
    const menuExpandCheckbox = document.getElementById('menu-expand')
    const menuExpandCheckboxHelper = document.getElementById('menu-expand-helper')

    if (!!menuExpandCheckbox) {
        menuExpandCheckbox.addEventListener('change', e => {
            menuExpandCheckboxHelper.checked = menuExpandCheckbox.checked
            if (menuExpandCheckboxHelper.checked) document.body.style.overflow = 'hidden';
            else document.body.style.overflow = 'auto';
        })
    }
})
