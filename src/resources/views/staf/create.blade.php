<div>

<a href="{{ route('stafIndex') }}">List</a>
<hr>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('message'))
    <li>{{ session()->get('message') }}</li>
@endif
{!! Form::open(['route' => 'stafStore','method' => 'post']) !!}

    <table>
        <tr>
            <td>OPD</td>
            <td>
                <select name="opd_id">
                    <option value="" selected disabled>-Select OPD-</option>
                    @foreach($opds as $opd)
                        <option value="{{ $opd->id }}">{{ $opd->name }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>User</td>
            <td>
                <select name="user_id">
                    <option value="" selected disabled>-Select User-</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>Full Name</td>
            <td>                
                {!! Form::text('full_name') !!}                
            </td>
        </tr>        
        <tr>
            <td>&nbsp;</td>
            <td>            
                {!! Form::submit('submit') !!}                
            </td>
        </tr>
    </table>
    
     
{!! Form::close() !!}

</div>