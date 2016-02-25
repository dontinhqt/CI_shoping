<link rel="stylesheet"href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jqueryui.css">
      <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
      <link rel="stylesheet" href="/resources/demos/style.css">
 <script type="text/javascript">
        $(document).ready(function() {
            $('#client_name').autocomplete({
                source: "check_in_client/"
            });
        });
    </script>
    <input type="text" name="client_name" id="client_name" placeholder="nome"/>