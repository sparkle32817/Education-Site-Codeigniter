$(document).ready(function () {

    $(".trash-container").html(getInboxList());

    /*
    *   Events
    */
    $("#message-delete").on("click", function () {

        var checkedIDs = $('.custom-control-input.checkbox:checkbox:checked').map(function() {
            return $(this).attr("msgID");
        }).get();
        console.log(checkedIDs);

        if (!Array.isArray(checkedIDs) || !checkedIDs.length)
        {
            return false;
        }

        var response = "";
        $.ajax({
            url: base_url + "inbox/deleteMessage",
            method: "post",
            data: {ids: checkedIDs},
            dataType: "text",
            async: false,
            success: function (data) {
                response = data;
            }
        });

        $(".trash-container").html(getInboxList());

    });

    $("#message-restore").on("click", function () {

        var checkedIDs = $('.custom-control-input.checkbox:checkbox:checked').map(function() {
            return $(this).attr("msgID");
        }).get();
        console.log(checkedIDs);

        if (!Array.isArray(checkedIDs) || !checkedIDs.length)
        {
            return false;
        }

        var response = "";
        $.ajax({
            url: base_url + "inbox/restoreMessage",
            method: "post",
            data: {ids: checkedIDs},
            dataType: "text",
            async: false,
            success: function (data) {
                response = data;
            }
        });

        $(".trash-container").html(getInboxList());

    });

    $("#checkbox_all").on("click", function () {
        $(".checkbox").prop("checked", $(this).is(":checked"));
    });

    /*
    *   Functions
    */
    function getTrashMessage() {

        var response = [];
        $.ajax({
            url: base_url + "inbox/getTrashMessage",
            method: "get",
            dataType: "json",
            async: false,
            success: function (data) {
                response = data;
            }
        });

        return response;
    }

    function getInboxList() {

        let messages = getTrashMessage();
        let sent_html = '';

        $.each(messages, function (index, message) {

            sent_html += `<tr>
                                <td width="10%">
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input checkbox" id="checkbox` + message.id + `" msgID="` + message.id + `" value="check">
                                        <label class="custom-control-label" for="checkbox` + message.id + `"></label>
                                    </div>
                                </td>
                                <td class="max-texts"><a href="` + base_url + message.router + `/` + message.id + `">` + message.title.substr(0, 70) + `</a></td>
                                <td class="text-right" width="10%"> ` + message.date + ` </td>
                            </tr>`;
        });

        return sent_html==""? "<tr><td class='no-hover' colspan='4'><p class='text-center'>There is no message</p></td></tr>": sent_html;
    }
});