<script>
         $(document).ready(function(){
             $(".row").click(function(){

                 var name_0 = $("#name_0").val();
                 var name_1 = $("#name_1").val();
                 var name_2 = $("#name_2").val();
                 var name_3 = $("#name_3").val();
                 var name_4 = $("#name_4").val();
                 var name_5 = $("#name_5").val();
                 var name_6 = $("#name_6").val();


                 var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + name_0 + "</td><td>" + name_1 + "</td><td>" + name_2 + "</td><td>" + name_3 + "</td><td>" + name_4 + "</td><td>" + name_5 + "</td><td>" + name_6 + "</td></tr>";
                 $("table tbody").append(markup);
             });

             $(".del_row").on('click',function(){
                alert(1);
                $('input:checked').each(function() {
                $(this).closest('tr').remove();
});
             });        
         });    