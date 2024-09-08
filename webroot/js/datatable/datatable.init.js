/****************************************
 *       Product Table                   *
 ****************************************/
$("#product-list").DataTable({
    pagingType: "full_numbers",
    columnDefs: [
        {
            target: 7,
            orderable: false
        },
    ]
});
