$(document).ready(function(){
    console.log("File ajax.js loaded");

    $(document).on("click", "[data-action='btn-ajax']", function(event) {
        console.log("route call : " + $(this).data("url"));
        $.ajax({
            url: $(this).data("url"),
        }).done(function(data) {
            showAlerts(data);
            showViews(data, event.target);
        });
    });

    function showAlerts(data) {
        if ("alerts" in data) {
            for (const alert of data["alerts"]) {
                showAlert(alert["status"], alert["message"]);
            }
        }
    }

    function showAlert(status, message, timeout=1000) {
        const html = "" +
            "<div class='alert alert-dismissible alert-" + status + "'>" +
                "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>" +
                message +
            "</div>";
        $(".container").prepend(html);
        setTimeout(function(){
            console.log("remove alert");
            console.log($(".alert .alert-dismissible"));
            $(".alert.alert-dismissible").remove();
        }, timeout);
    }

    function showViews(data, item) {
        if ("views" in data) {
            for (const view of data["views"]) {
                showView(view["selector"], view["html"], item);
            }
        }
    }

    function showView(selector, html, item) {
        if (selector === "this") {
            $(item).replaceWith(html);
        } else {
            $(selector)?.replaceWith(html);
        }
    }
});


