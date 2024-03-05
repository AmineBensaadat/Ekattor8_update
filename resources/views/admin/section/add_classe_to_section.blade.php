<br>
<br>
<div class="eoff-form">
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-auto">
                <button id="addClassBtn" class="btn btn-primary">Add Class</button>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
      <div class="row mt-3">
        <div class="col">
            <table id="classTable" class="table">
                <thead>
                    <tr>
                        <th scope="col">Column 1</th>
                        <th scope="col">Column 2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        $("#addClassBtn").click(function() {
            var table = $("#classTable tbody");
            var newRow = $("<tr>");
            newRow.append("<td>New Data 1</td>");
            newRow.append("<td>New Data 2</td>");
            table.append(newRow);
        });
    });
</script>
