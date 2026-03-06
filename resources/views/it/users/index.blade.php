@extends('layouts.it_support')

@section('content')
<div style="font-family: 'Montserrat', sans-serif;">

    <div style="background: white; padding: 24px; border-radius: 8px; box-shadow: 0px 4px 20px rgba(0,0,0,0.05);">
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; flex-wrap: wrap; gap: 16px;">
            
            <div style="display: flex; align-items: center; gap: 24px; flex-wrap: wrap;">
                <div style="display: flex; align-items: center; gap: 12px;">
                    <span style="font-size: 12px; font-weight: 500; color: black;">Show</span>
                    <select style="background: #E0E0E0; border: none; padding: 8px 12px; border-radius: 8px; font-size: 12px; font-weight: 500; outline: none; color: black;">
                        <option>10</option>
                    </select>
                    <span style="font-size: 12px; font-weight: 500; color: black;">entries</span>
                </div>
                <div style="display: flex; align-items: center; gap: 8px; border: 1px solid #9E9E9E; padding: 8px 12px; border-radius: 8px; width: 250px;">
                    <i class='bx bx-search' style="color: #9E9E9E;"></i>
                    <input type="text" placeholder="Search user..." style="border: none; background: transparent; outline: none; font-family: 'Montserrat'; font-size: 12px; color: #9E9E9E; width: 100%;">
                </div>
            </div>

            <!-- <button style="background: #D30007; color: white; border: none; padding: 10px 16px; border-radius: 8px; font-family: 'Montserrat'; font-weight: 700; font-size: 12px; cursor: pointer; display: flex; align-items: center; gap: 8px; transition: background 0.2s;" onmouseover="this.style.background='#b00006'" onmouseout="this.style.background='#D30007'">
                <i class='bx bx-plus' style="font-size: 16px;"></i> Tambahkan User
            </button> -->
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; min-width: 900px;">
                <thead>
                    <tr style="text-align: left; border-bottom: 1px solid #E9EAEC;">
                        <th style="padding: 16px; font-size: 14px; font-weight: 700; color: black; text-align: center;">Username</th>
                        <th style="padding: 16px; font-size: 14px; font-weight: 700; color: black;">Nama User</th>
                        <th style="padding: 16px; font-size: 14px; font-weight: 700; color: black;">Email</th>
                        <th style="padding: 16px; font-size: 14px; font-weight: 700; color: black;">Role</th>
                        <th style="padding: 16px; font-size: 14px; font-weight: 700; color: black;">Divisi</th>
                        <th style="padding: 16px; font-size: 14px; font-weight: 700; color: black;">Status</th>
                        <!-- <th style="padding: 16px; font-size: 14px; font-weight: 700; color: black; text-align: center;">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $item)
                    <tr style="background: {{ $loop->index % 2 == 0 ? '#F7F6FE' : 'white' }}; border-bottom: 1px solid #E9EAEC;">
                        
                        <td style="padding: 16px; font-size: 14px; font-weight: 500; text-align: center; color: black;">{{ $item->username }}</td>
                        
                        <td style="padding: 16px; font-size: 14px; font-weight: 500; color: black; display: flex; align-items: center; gap: 8px;">
                            <div style="width: 32px; height: 32px; background: #C4C4C4; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                <i class='bx bx-user' style="color: white; font-size: 16px;"></i>
                            </div>
                            {{ $item->nama_user }}
                        </td>
                        
                        <td style="padding: 16px; font-size: 14px; font-weight: 500; color: black;">{{ $item->email }}</td>
                        
                        <td style="padding: 16px; font-size: 14px; font-weight: 500; color: black;">
                            <span style="background: #F3F3F3; color: #21252B; font-size: 12px; font-weight: 600; padding: 6px 14px; border-radius: 20px;">
                                {{ $item->role }}
                            </span>
                        </td>
                        
                        <td style="padding: 16px; font-size: 14px; font-weight: 500; color: black;">
                            {{ $item->nama_divisi ?? '-' }} </td>
                        
                        <td style="padding: 16px;">
                            @if($item->status == 'Aktif')
                                <span style="background: #EBF9F1; color: #1F9254; font-size: 12px; font-weight: 500; padding: 6px 14px; border-radius: 20px;">Aktif</span>
                            @else
                                <span style="background: #FBE7E8; color: #A30D11; font-size: 12px; font-weight: 500; padding: 6px 14px; border-radius: 20px;">Nonaktif</span>
                            @endif
                        </td>
                        
                        <!-- <td style="padding: 16px; text-align: center;">
                            <div style="display: flex; justify-content: center; gap: 12px;">
                                <button style="width: 24px; height: 24px; background: transparent; border: 2px solid #624DE3; border-radius: 4px; cursor: pointer; display: flex; justify-content: center; align-items: center; transition: background 0.2s;" onmouseover="this.style.background='#624DE3'; this.children[0].style.color='white';" onmouseout="this.style.background='transparent'; this.children[0].style.color='#624DE3';">
                                    <i class='bx bx-edit-alt' style="color: #624DE3; font-size: 14px; transition: color 0.2s;"></i>
                                </button>
                                <button style="width: 24px; height: 24px; background: transparent; border: 2px solid #A30D11; border-radius: 4px; cursor: pointer; display: flex; justify-content: center; align-items: center; transition: background 0.2s;" onmouseover="this.style.background='#A30D11'; this.children[0].style.color='white';" onmouseout="this.style.background='transparent'; this.children[0].style.color='#A30D11';">
                                    <i class='bx bx-trash' style="color: #A30D11; font-size: 14px; transition: color 0.2s;"></i>
                                </button>
                            </div>
                        </td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="display: flex; justify-content: center; align-items: center; gap: 12px; margin-top: 24px;">
            <span style="color: #9E9E9E; font-size: 12px; font-weight: 500;">Previous</span>
            <div style="padding: 8px 12px; background: #624DE3; color: white; border-radius: 8px; font-size: 12px; font-weight: 500;">1</div>
            <div style="padding: 8px 12px; background: #E0E0E0; color: black; border-radius: 8px; font-size: 12px; font-weight: 500;">2</div>
            <span style="color: #9E9E9E; font-size: 12px; font-weight: 500;">Next</span>
        </div>

    </div>
</div>
@endsection