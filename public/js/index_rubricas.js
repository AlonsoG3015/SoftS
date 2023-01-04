var table = document.getElementById('table');
var btn = document.getElementById('export-btn');
var export_document = document.getElementById('export');

document.getElementById('add_fila').onclick(function () {
    var clone = table.find('tr.hide').clone(true).removeClass('hide table-line');
    table.find('table').append(clone);
});

$('.table-remove').onclick(function () {
    $(this).parents('tr').detach();
});

$('.table-up').onclick(function () {
    var row = $(this).parents('tr');
    if (row.index() === 1) return; // Don't go above the header
    row.prev().before(row.get(0));
});

$('.table-down').onclick(function () {
    var row = $(this).parents('tr');
    row.next().after(row.get(0));
});

// A few jQuery helpers for exporting only
jQuery.fn.pop = [].pop;
jQuery.fn.shift = [].shift;

btn.onclick(function () {
    var rows = table.find('tr:not(:hidden)');
    var headers = [];
    var data = [];

    // Get the headers (add special header logic here)
    $(rows.shift()).find('th:not(:empty)').each(function () {
        headers.push($(this).text().toLowerCase());
    });

    // Turn all existing rows into a loopable array
    rows.each(function () {
        var td = $(this).find('td');
        var h = {};

        // Use the headers from earlier to name our hash keys
        headers.forEach(function (header, i) {
            h[header] = td.eq(i).text();
        });

        data.push(h);
    });

    // Output the result
    export_document.text(JSON.stringify(data));
});