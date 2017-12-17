<div>
    <a href="{{ route('stafCreate') }}">Tambah data</a>
    <hr>
    <table border="1">
        <tr>
            <th>#</th>
            <th>Full name</th>            
            <th>Username</th>
            <th>Email</th>
            <th>Opd</th>
            <th>Action</th>
        </tr>
        @forelse($stafs as $key => $staf)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $staf->full_name }}</td>            
            <td>{{ $staf->getUser->name }}</td>
            <td>{{ $staf->getUser->email }}</td>
            <td>{{ $staf->getOpd->name }}</td>
            <td>
                <a href="{{ route('stafShow',$staf->id) }}">View</a>
                <a href="{{ route('stafEdit',$staf->id) }}">Edit</a>
                <a href="{{ route('stafDelete',$staf->id) }}">Delete</a>
            </td>            
        </tr>
        @empty
            <tr>
                <td colspan='7' align="center">belum ada data</td>
            </tr>
        @endforelse
    </table>

</div>