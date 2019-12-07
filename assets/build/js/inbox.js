$(document).ready(function () {

    $(".inbox-container").html(getInboxList());

    /*
    *   Events
    */
    $("#inbox-delete").on("click", function () {

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
            url: base_url + "inbox/sendToTrash",
            method: "post",
            data: {ids: checkedIDs},
            dataType: "text",
            async: false,
            success: function (data) {
                response = data;
            }
        });

        $(".inbox-container").html(getInboxList());

    });
    
    $("#inbox-reload").on("click", function () {
        $(".inbox-container").html(getInboxList());
    });

    $("#mark-all-read").on("click", function () {

        var response = "";
        $.ajax({
            url: base_url + "inbox/markAllRead",
            method: "get",
            dataType: "text",
            async: false,
            success: function (data) {
                response = data;
            }
        });

        $(".inbox-container").html(getInboxList());

    });

    /*
    *   Functions
    */
    function getInbox() {

        var response = [];
        $.ajax({
            url: base_url + "inbox/getInbox",
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

        let inboxes = getInbox();
        let inbox_html = '';

        $.each(inboxes, function (index, inbox) {

            let readStatus = "";
            if (inbox.read_status == 0)
            {
                readStatus = "unread";
            }
            inbox_html += `<tr class="` + readStatus + `">
                                <td width="10%">
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input checkbox" id="checkbox` + inbox.id + `" msgID="` + inbox.id + `" value="check">
                                        <label class="custom-control-label" for="checkbox` + inbox.id + `"></label>
                                    </div>
                                </td>
                                <td class="hidden-xs-down" width="15%">` + inbox.sender + `</td>
                                <td class="max-texts"><a href="` + base_url + `inbox/detail/` + inbox.id + `">` + inbox.title.substr(0, 70) + `</a></td>
                                <td class="text-right" width="10%"> ` + inbox.date + ` </td>
                            </tr>`;
        });

        return inbox_html==""? "<tr><td class='no-hover' colspan='4'><p class='text-center'>There is no message</p></td></tr>": inbox_html;
    }
});