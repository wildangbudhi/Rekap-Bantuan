<form action="/transaksi/new" method="post">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">Jenis</td>
                <td align="center">Jumlah</td>
                <td align="center">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Add New
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            {% for kategori in kategoris %}
                                <button type="button" class="dropdown-item opsi" value="{{ kategori.id }}">{{ kategori.name }}</button>
                            {% endfor %}
                        </div>
                    </div>
                </td>
            </tr>
        </thead>
        <tbody id="option_container"></tbody>
    </table>
    <button class="btn btn-primary" type="submit">SUBMIT</button>
</form>
    
<script>

    $(document).ready( () => {

        $(document).on('click', '.remove-item', function () {
            console.log( $(this).closest('tr') );
            $(this).closest('tr').remove();
        } );
        
        const name = { 
            {% for kategori in kategoris %}
                {{ kategori.id }} : "{{ kategori.name }}",
            {% endfor %}
        };

        const button = $(".opsi");
        const container = $("#option_container");

        for( let i=0; i<button.length; i++ )
        {
            button[i].addEventListener("click", (e) => {

                var id = e.target.value;
                var value_name = name[ e.target.value ];

                var template = `
                <tr class="block_container">
                    <input type="hidden" name="kategori_bantuan_id[]" value="${id}">
                    <td align="center">${value_name}</td>
                    <td align="center">
                        <input type="number" name="quantity[]">
                    </td>
                    <td align="center">
                        <button class="btn btn-danger remove-item">DELETE</button>
                    </td>
                </tr>
                `;

                container.append( template );

            } );
        }
    });
</script>