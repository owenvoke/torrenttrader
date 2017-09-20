<table class="table table-bordered">
    <colgroup>
        <col>
    </colgroup>

    <thead>
    <tr>
        <th>Title</th>
        <th>Size</th>
        <th>Files</th>
        <th>Age</th>
        <th>Seed</th>
        <th>Leech</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($torrents as $torrent)
        <tr>
            <td>{{ $torrent->title }}</td>
            <td>{{ $torrent->size }}</td>
            <td>{{ count($torrent->files) }}</td>
            <td>{{ $torrent->created_at }}</td>
            <td></td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>