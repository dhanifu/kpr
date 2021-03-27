jQuery(function ($) {
    const table = $("table").DataTable({
        responsive: true,
        serverSide: true,
        processing: true,
        ajax: {
            url: dataUrl,
            type: "get",
            error: (response) => {
                console.log(response);
            },
        },
        searching: true,
        scrollY: 1000,
        scrollX: true,
        scrollCollapse: true,
        columns: [
            {
                data: null,
                sortable: false,
                searchable: false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },
            },
            { data: "nama" },
            { data: "pangkat" },
            { data: "corps" },
            { data: "nrp" },
            { data: "kesatuan" },
            { data: "tahap" },
            { data: "pinjaman" },
            { data: "jk_waktu" },
            { data: "tmt_angsuran" },
            { data: "jml_angs" },
            { data: "angs_ke" },
            { data: "angsuran_masuk" },
            { data: "tunggakan" },
            { data: "jml_tunggakan" },
            { data: "keterangan" },
        ],
    });

    const reload = () => table.ajax.reload();
});
