document.addEventListener('DOMContentLoaded', function () {
  var elems = document.querySelectorAll('select');
  var instances = M.FormSelect.init(elems, {
    dropdownOptions: {
      coverTrigger: false
    },
    classes: 'select-wrapper',
    dropdown: 'dropdown-content',
    button: 'btn',
  });
});