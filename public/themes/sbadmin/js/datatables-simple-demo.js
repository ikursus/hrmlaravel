window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');

    let options = {
        searchable: true,
        perPage: 50,
        perPageSelect: [10, 25, 50, 100],
    };

    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple, options);
    }
});
