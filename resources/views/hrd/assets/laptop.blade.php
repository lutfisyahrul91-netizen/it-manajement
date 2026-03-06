@extends('layouts.hrd')

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
                    <input type="text" placeholder="Search laptop..." style="border: none; background: transparent; outline: none; font-family: 'Montserrat'; font-size: 12px; color: #9E9E9E; width: 100%;">
                </div>
            </div>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; min-width: 900px;">
                <thead>
                    <tr style="text-align: left; border-bottom: 1px solid #E9EAEC;">
                        <th style="padding: 16px; font-size: 14px; font-weight: 700; color: black; text-align: center;">No. Seri</th>
                        <th style="padding: 16px; font-size: 14px; font-weight: 700; color: black;">Merk</th>
                        <th style="padding: 16px; font-size: 14px; font-weight: 700; color: black;">Tahun Pengadaan</th>
                        <th style="padding: 16px; font-size: 14px; font-weight: 700; color: black;">Pemeliharaan</th>
                        <th style="padding: 16px; font-size: 14px; font-weight: 700; color: black;">Jumlah</th>
                        <th style="padding: 16px; font-size: 14px; font-weight: 700; color: black;">Kondisi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laptops as $item)
                    <tr style="background: {{ $loop->index % 2 == 0 ? '#F7F6FE' : 'white' }}; border-bottom: 1px solid #E9EAEC;">
                        
                        <td style="padding: 16px; font-size: 14px; font-weight: 500; text-align: center; color: black;">{{ $item->no_seri }}</td>
                        <td style="padding: 16px; font-size: 14px; font-weight: 500; color: black; display: flex; align-items: center; gap: 8px;">
                            <div style="width: 32px; height: 32px; background: #C4C4C4; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                <i class='bx bx-laptop' style="color: white; font-size: 16px;"></i>
                            </div>
                            {{ $item->merk }}
                        </td>
                        <td style="padding: 16px; font-size: 14px; font-weight: 500; color: black;">{{ $item->tahun_pengadaan }}</td>
                        <td style="padding: 16px; font-size: 14px; font-weight: 500; color: black;">{{ $item->pemeliharaan }}</td>
                        <td style="padding: 16px;">
                            <span style="background: #EBF9F1; color: #1F9254; font-size: 12px; font-weight: 500; padding: 6px 14px; border-radius: 20px;">
                                {{ $item->jumlah }}
                            </span>
                        </td>
                        <td style="padding: 16px;">
                            @if($item->kondisi == 'Baik')
                                <span style="background: #EBF9F1; color: #1F9254; font-size: 12px; font-weight: 500; padding: 6px 14px; border-radius: 20px;">Baik</span>
                            @elseif($item->kondisi == 'Pemeliharaan')
                                <span style="background: #FEF2E5; color: #CD6200; font-size: 12px; font-weight: 500; padding: 6px 14px; border-radius: 20px;">Pemeliharaan</span>
                            @else
                                <span style="background: #FBE7E8; color: #A30D11; font-size: 12px; font-weight: 500; padding: 6px 14px; border-radius: 20px;">Rusak</span>
                            @endif
                        </td>
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