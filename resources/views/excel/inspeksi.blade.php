<table border="1">

    <tr>
        <th colspan="6">
            PENGUKURAN BEBAN TRAFO DAN TEGANGAN UJUNG
        </th>
    </tr>

    <tr>
        <td>ULP</td>
        <td>{{ $data->ulp }}</td>

        <td>Alamat</td>
        <td colspan="3">{{ $data->alamat }}</td>
    </tr>

    <tr>
        <td>ID Gardu</td>
        <td>{{ $data->id_gardu }}</td>

        <td>Penyulang</td>
        <td colspan="3">{{ $data->penyulang }}</td>
    </tr>

    <tr>
        <td>Merk</td>
        <td>{{ $data->merk }}</td>

        <td>Daya</td>
        <td colspan="3">{{ $data->daya }}</td>
    </tr>

    <tr>
        <th>Phasa</th>
        <th>R</th>
        <th>S</th>
        <th>T</th>
        <th>N</th>
        <th>Induk</th>
    </tr>

    <tr>
        <td>Beban</td>
        <td>{{ $data->arus_r }}</td>
        <td>{{ $data->arus_s }}</td>
        <td>{{ $data->arus_t }}</td>
        <td>{{ $data->arus_n }}</td>
        <td>-</td>
    </tr>

    <tr>
        <th colspan="6">
            TEGANGAN
        </th>
    </tr>

    <tr>
        <td>R-N</td>
        <td>{{ $data->tegangan_vr }}</td>

        <td>S-N</td>
        <td>{{ $data->tegangan_vs }}</td>

        <td>T-N</td>
        <td>{{ $data->tegangan_vt }}</td>
    </tr>

</table>