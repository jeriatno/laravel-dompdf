<div class="row">
    <div class="col-md-5">
    	<h1>Inputan</h1><br>
        <form action="{{ url('/') }}" method="post" class="form-horizontal">
        	{{ csrf_field() }}
        	<label class="label-control pull-left" for="">Tanggal</label>
        	<input class="form-control" type="date" name="tanggal"><br>

        	<label class="label-control pull-left" for="">Keterangan</label>
        	<textarea class="form-control" name="keterangan"></textarea><br>

        	<label class="label-control pull-left" for="">Pilihan</label>
        	<select name="pilihan" class="form-control" id="pilihan">
        		<option value="">Pilih :</option>
        		<option value="debet">Debet</option>
        		<option value="kredit">Kredit</option>
        	</select><br>	

        	<div id="pilih"></div>
			<br>

        	<label class="label-control pull-left" for="">Saldo</label>
        	<input id="saldo" class="form-control" type="number" name="saldo" value="{{ $total_saldo }}"><br>

        	<input class="form-control btn btn-info" style="color:black" type="submit" name="simpan" value="Simpan"><br>
        </form>
    </div>

    <div class="col-md-6 col-md-offset-1">
    	<h1>Data</h1><br>
    	<table class="table table-hover">
    		<thead class="bg-success">
		        <th>No</th>
		        <th>Tanggal</th>
		        <th>Keterangan</th>
		        <th>Debet</th>
		        <th>Kredit</th>
		        <th>Saldo</th>
    		</thead>
    		<tbody>
    			@if(!$data->isEmpty())
	    			@foreach($data as $d)
				        <tr>
				            <th>{{ $d->id }}</th>
				            <td style="text-align: center">{{ $date = date('d-m-Y', strtotime(str_replace('/', '-', $d->tanggal))) }}</td>
				            <td style="text-align: left">{{ $d->keterangan }}</td>
				            <td style="text-align: right">{{ $d->debet }}</td>
				            <td style="text-align: right">{{ $d->kredit }}</td>
				            <td style="text-align: right">{{ $d->saldo }}</td>
				        </tr>       
				    @endforeach
				@endif
				<tr><td colspan="6"></td></tr>
				<tr class="bg-success">
			        <td></td>
			        <td></td>
			        <td>Jumlah</td>
			        <td>{{ $total_debet }}</td>
			        <td>{{ $total_kredit }}</td>
			        <td>{{ $total_saldo }}</td>
			    </tr>
    		</tbody>
    	</table>
        
    </div>
</div>

@section('script') 

	<script type="text/javascript">
        $(document).ready(function() {
            $('#pilihan').on('change', function(e) {
            	e.preventDefault();

            	var pilihan = e.target.value;
            	var hasil   = 0;

            	if(pilihan == 'debet') {
            		$('#pilih').append(
            			'<input id="debet" class="form-control" type="number" name="debet" placeholder="Input Debet">'+
            			'<input class="form-control" type="hidden" name="kredit" value="0">'
            		);

	            		saldo = $('#saldo').val();
            		$('#debet').on('input', function(e) {
	            		debet = $('#debet').val();
            			hasil = Number(saldo) + Number(debet);
            			$('#saldo').val(hasil);
            		});

            		$('#kredit').remove();
            	}
            	else if(pilihan == 'kredit') {
            		$('#pilih').append(
            			'<input id="kredit" class="form-control" type="number" name="kredit" placeholder="Input Kredit">'+
            			'<input class="form-control" type="hidden" name="debet" value="0">'
            		);

	            		saldo = $('#saldo').val();
            		$('#kredit').on('input', function(e) {
	            		kredit = $('#kredit').val();
	            		hasil  = Number(saldo) - Number(kredit);
            			$('#saldo').val(hasil);
            		});

            		$('#debet').remove();
            	}
            }); 
        });

    </script>

@stop