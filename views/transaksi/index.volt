<h2>History Transaksi</h2>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <td align="center">ID</td>
            <td>Transaction Date</td>
            <td align="center">Jumlah Jenis</td>
            <td align="center">
                 <a href="/" class="btn btn-primary">CREATE NEW</a>
            </td>
        </tr>
    </thead>
    <tbody>
    {% for transaksi in histories_transaksi %}
        <tr>
            <td align="center">{{ transaksi.id }}</td>
            <td>{{ transaksi.transaction_date }}</td>
            <td align="center">{{ transaksi.transaksi_bantuan_user|length }}</td>
            <td align="center">
                <a href="/" class="btn btn-primary">EDIT</a>
                <a href="/" class="btn btn-danger">DELETE</a>
            </td>
        </tr>
    {% endfor %}
    </tbody>
</table>
