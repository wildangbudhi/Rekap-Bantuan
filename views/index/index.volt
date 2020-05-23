<div class="jumbotron">
    <h1>Welcome to Rekap Bantuan</h1>
    <p>Aplikasi ini digunakan untuk melakukan Rekap Bantuan untuk Terdampak COVID19</p>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <td align="center">Kategori</td>
            <td align="center">Jumlah</td>
        </tr>
    </thead>
    <tbody>
        {% for r in rekap %}
            <tr>
                <td align="center">{{ r[0] }}</td>
                <td align="center">{{ r[1] }}</td>
            </tr>
        {% endfor %}
    </tbody>
</table>