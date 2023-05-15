@extends('layout')
@section('content')
<body>
    <form action="{{route('response.update', $dataId)}}" method="POST" style="width: 500px; margin: 50px auto;">
        @csrf
        @method('PATCH')
        <div class="input-card">
            <label for="status">Status :</label>
            @if ($data)
            <select name="status" id="status">
                <option selected hidden disabled>Pilih Status </option>
                <option value="ditolak" {{ $data['status'] == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                <option value="diterima" {{ $data['status'] == 'diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="proses" {{ $data['status'] == 'proses' ? 'selected' : '' }}>Proses</option>
            </select>
            @else
            <select name="status" id="status">
                <option selected hidden disabled>Pilih Status </option>
                <option value="ditolak">Ditolak</option>
                <option value="diterima">Diterima</option>
                <option value="proses">Proses</option>
            </select>
            @endif
        </div>
        <div class="input-caard">
            <label for="pesan">Pesan :</label>
            <textarea name="response" id="response" rows="3">{{ $data ? $data['pesan'] : '' }}</textarea>
        </div>
        <button type="submit">Send Response</button>
    </form>
@endsection