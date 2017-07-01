<html>
<body style="text-align: center">

    <header>
        <h2>Laporan Data Keuangan</h2>
    </header>
    
    <table border="1px" style="text-align: center" width="100%">
        <thead>
            <tr height="30px" style="text-align:center; background-color:silver">
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Debet</th>
                <th>Kredit</th>
                <th>Saldo</th>
            </tr>  
        <thead>
        <tbody>
            @foreach($data as $d) 
                <tr height="30px">
                    <td>{{ $d->id }}</td>
                    <td style="text-align: center">{{ $date = date('d-m-Y', strtotime(str_replace('/', '-', $d->tanggal))) }}</td>
                    <td>{{ $d->keterangan }}</td>
                    <td>{{ $d->debet }}</td>
                    <td>{{ $d->kredit }}</td>
                    <td>{{ $d->saldo }}</td>
                </tr>  
            @endforeach
            <tr>
                <th></th>
                <th></th>
                <th>Jumlah :</th>
                <th>{{ $total_debet }}</th>
                <th>{{ $total_kredit }}</th>
                <th>{{ $total_saldo }}</th>
            </tr>
        </tbody> 
    </table>


</body>

</html>