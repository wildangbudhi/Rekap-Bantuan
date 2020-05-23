<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <td align="center">Jenis</td>
            <td align="center">Jumlah</td>
        </tr>
    </thead>
    <tbody id="option_container">
    {% for detail in detail_data %}
        <tr>
            <td align="center">{{ detail.kategori_bantuan.name }}</td>
            <td align="center">{{ detail.quantity }}</td>
        </tr>
    {% endfor %}
    </tbody>
</table>