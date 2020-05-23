<h2>History Transaksi</h2>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <td align="center">ID</td>
            <td>Jenis</td>
            <td align="center">Satuan</td>
            <td align="center">
                 <a href="/transaksi/new" class="btn btn-primary">CREATE NEW</a>
            </td>
        </tr>
    </thead>
    <tbody>
    {% for transaksi in histories_transaksi %}
        <tr>
            <td align="center">{{ transaksi.id }}</td>
            <td>{{ transaksi.transaction_date }}</td>
            <td align="center">{{ transaksi.detail_bantuan_user|length }}</td>
            <td align="center">
                <a href="/transaksi/detail/{{ transaksi.id }}" class="btn btn-primary">SHOW</a>
                <a href="/transaksi/delete/{{ transaksi.id }}" class="btn btn-danger">DELETE</a>
            </td>
        </tr>
    {% endfor %}
    </tbody>
</table>
