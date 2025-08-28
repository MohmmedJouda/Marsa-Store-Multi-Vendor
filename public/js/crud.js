// public/js/crud.js
$(document).ready(function () {
    // معالجة عرض Modal التعديل
    $("#kt_modal_edit_vendor").on("show.bs.modal", function (event) {
        var button = $(event.relatedTarget); // الزر الذي تم النقر عليه
        // var id = button.data("id"); // استخراج الـ ID من data attribute
        var id = button.attr("data-id");
        // alert(id);
        // تعبئة حقول الـ Modal
        var modal = $(this);
        modal.find('input[name="id"]').val(id);

        // جلب بيانات البائع عبر AJAX
        $.ajax({
            url: "/moderator/vendor/" + id + "/edit",
            type: "GET",
            success: function (data) {
                // تعبئة الحقول بالبيانات
                modal.find('input[name="name"]').val(data.name);
                modal.find('input[name="email"]').val(data.email);
                modal.find('input[name="store_name"]').val(data.store_name);
                modal.find('input[name="description"]').val(data.description);
                modal.find('input[name="phone"]').val(data.phone);
                modal.find('input[name="address"]').val(data.address);
                modal.find('input[name="status"]').val(data.status);
                console.log(data.name);
            },
            error: function () {
                alert("Something whiten get data!");
            },
        });
    });

    // Add Items
    window.store = function (url, data) {
        return axios
            .post(url, data, {
                headers: {
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                    "X-HTTP-Method-Override": "POST",
                },
            })
            .then(function (response) {
                console.log(response);

                $("#kt_modal_add_vendor").modal("hide");
                $("#vendors-table-body").html(response.data.html);
                // console.log(response.data.html);
                toastr.success(response.data.message);
                console.log(response.data.message);
                KTMenu.createInstances();
            })
            .catch(function (error) {
                console.error(error);
                toastr.error(error.response.data.message);
            });
    };

    // Update Items
    window.update = function (url, data) {
        axios
            .post(url, data, {
                headers: {
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                    "X-HTTP-Method-Override": "PUT",
                },
            })
            .then(function (response) {
                $("#kt_modal_edit_vendor").modal("hide");
                $("#vendors-table-body").html(response.data.html);
                console.log(response.data.html);
                toastr.success(response.data.message);
                console.log(response.data.message);
                KTMenu.createInstances();
            })
            .catch(function (error) {
                console.error(error);
                toastr.error(error.response.data.message);

                console.log("Error In Data Updated");
            });
    };

    // Update Items
    window.destroy = function (url, reference) {
        axios
            .delete(url, {
                headers: {
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                    "X-HTTP-Method-Override": "DELETE",
                },
            })
            .then(function (response) {
                // toastr.success(response.data.message);
                // console.log(response.data.message);
                KTMenu.createInstances();
                showMessage(response.data);
                // const row = document.getElementById(`vendor-row-${id}`);
                console.log(reference);

                const row = reference.closest("tr");
                row.remove();
                console.log(row);
            })
            .catch(function (error) {
                console.error(error);
                if (error) {
                    showMessage(error.response.data);
                } else {
                    console.log("Error In Data Deleted");
                }
            });
    };

    function showMessage(data) {
        Swal.fire({
            icon: data.icon,
            title: data.title,
            showConfirmButton: false,
            timer: 1500,
        });
    }

    // Search
    let originalTableBody = $("#vendors-table-body").html();

    function fetchVendorsData() {
        var query = $("#searchInput").val();
        var status = $("#statusFilter").val();

        if (query === "" && (status === "" || status === "all")) {
            $("#vendors-table-body").html(originalTableBody);
            KTMenu.createInstances();
            return;
        }

        $.ajax({
            url: "/moderator/vendors/search",
            method: "GET",
            data: {
                query: query,
                status: status,
            },
            success: function (data) {
                $("#vendors-table-body").html(data.html);
                KTMenu.createInstances();
            },
            error: function () {
                console.error("error in fetch data");
            },
        });
    }

    $("#searchInput").on("input", fetchVendorsData);

    $("#statusFilter").on("change", fetchVendorsData);
});
