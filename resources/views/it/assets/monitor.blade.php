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
                    <input type="text" placeholder="Search monitor..." style="border: none; background: transparent; outline: none; font-family: 'Montserrat'; font-size: 12px; color: #9E9E9E; width: 100%;">
                </div>
            </div>

            <div style="display: flex; gap: 12px; align-items: center;">
                <div style="position: relative; display: inline-block;" onmouseover="this.querySelector('.dropdown-content').style.display='block'" onmouseout="this.querySelector('.dropdown-content').style.display='none'">
                    <button style="background: #21252B; color: white; border: none; padding: 10px 16px; border-radius: 8px; font-family: 'Montserrat'; font-weight: 700; font-size: 12px; cursor: pointer; display: flex; align-items: center; gap: 8px;">
                        <i class='bx bx-export'></i> Export <i class='bx bx-chevron-down'></i>
                    </button>
        
                    <div class="dropdown-content" style="display: none; position: absolute; right: 0; background-color: white; min-width: 160px; box-shadow: 0px 8px 16px rgba(0,0,0,0.1); border-radius: 8px; z-index: 100; border: 1px solid #E9EAEC; overflow: hidden;">
                        <a href="{{ route('it.monitor.excel') }}" style="color: #21252B; padding: 12px 16px; text-decoration: none; display: flex; align-items: center; gap: 10px; font-size: 13px; font-weight: 500; transition: background 0.2s;" onmouseover="this.style.background='#F7F6FE'" onmouseout="this.style.background='white'">
                            <i class='bx bxs-file-json' style="color: #1F9254;"></i> Export Excel
                        </a>
                        <a href="{{ route('it.monitor.pdf') }}" target="_blank" style="color: #21252B; padding: 12px 16px; text-decoration: none; display: flex; align-items: center; gap: 10px; font-size: 13px; font-weight: 500; transition: background 0.2s;" onmouseover="this.style.background='#F7F6FE'" onmouseout="this.style.background='white'">
                            <i class='bx bxs-file-pdf' style="color: #D30007;"></i> Export PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: separate; border-spacing: 0 12px; min-width: 900px; margin-top: -12px;">
                <thead>
                    <tr style="text-align: left;">
                        <th style="padding: 16px; font-size: 13px; font-weight: 700; color: #21252B; text-align: center;">No. Seri</th>
                        <th style="padding: 16px; font-size: 13px; font-weight: 700; color: #21252B;">Merk</th>
                        <th style="padding: 16px; font-size: 13px; font-weight: 700; color: #21252B;">Tahun Pengadaan</th>
                        <th style="padding: 16px; font-size: 13px; font-weight: 700; color: #21252B;">Pemeliharaan</th>
                        <th style="padding: 16px; font-size: 13px; font-weight: 700; color: #21252B; text-align: center;">Jumlah</th>
                        <th style="padding: 16px; font-size: 13px; font-weight: 700; color: #21252B;">Kondisi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($monitors as $item)
                    <tr style="background: {{ $loop->index % 2 == 0 ? '#F9F9FB' : 'white' }}; box-shadow: {{ $loop->index % 2 == 0 ? 'none' : '0px 2px 10px rgba(0,0,0,0.02)' }};">
                        
                        <td style="padding: 16px; font-size: 14px; font-weight: 600; text-align: center; color: #21252B; border-top-left-radius: 8px; border-bottom-left-radius: 8px;">
                            {{ $item->no_seri }}
                        </td>
                        
                        <td style="padding: 16px; font-size: 14px; font-weight: 500; color: #21252B; display: flex; align-items: center; gap: 12px;">
                            <div style="width: 36px; height: 36px; background: #E9EAEC; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                <i class='bx bx-desktop' style="color: #9E9E9E; font-size: 20px;"></i>
                            </div>
                            {{ $item->merk }}
                        </td>
                        
                        <td style="padding: 16px; font-size: 14px; font-weight: 600; color: #21252B;">
                            {{ $item->tahun_pengadaan }}
                        </td>
                        
                        <td style="padding: 16px; font-size: 14px; font-weight: 600; color: #21252B;">
                            {{ $item->pemeliharaan ?: '-' }}
                        </td>
                        
                        <td style="padding: 16px; text-align: center;">
                            <div style="display: inline-flex; justify-content: center; align-items: center; width: 28px; height: 28px; background: #EBF9F1; color: #1F9254; font-size: 13px; font-weight: 700; border-radius: 50%;">
                                {{ $item->jumlah }}
                            </div>
                        </td>
                        
                        <td style="padding: 16px; border-top-right-radius: 8px; border-bottom-right-radius: 8px;">
                            @if($item->kondisi == 'Baik')
                                <span style="background: #EBF9F1; color: #1F9254; font-size: 12px; font-weight: 600; padding: 6px 14px; border-radius: 20px;">Baik</span>
                            @elseif($item->kondisi == 'Pemeliharaan')
                                <span style="background: #FEF2E5; color: #CD6200; font-size: 12px; font-weight: 600; padding: 6px 14px; border-radius: 20px;">Pemeliharaan</span>
                            @else
                                <span style="background: #FBE7E8; color: #A30D11; font-size: 12px; font-weight: 600; padding: 6px 14px; border-radius: 20px;">Rusak</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="display: flex; justify-content: center; align-items: center; gap: 12px; margin-top: 16px;">
            <span style="color: #9E9E9E; font-size: 12px; font-weight: 500;">Previous</span>
            <div style="padding: 8px 12px; background: #624DE3; color: white; border-radius: 8px; font-size: 12px; font-weight: 500;">1</div>
            <div style="padding: 8px 12px; background: #E0E0E0; color: black; border-radius: 8px; font-size: 12px; font-weight: 500;">2</div>
            <span style="color: #9E9E9E; font-size: 12px; font-weight: 500;">Next</span>
        </div>

    </div>
</div>
@endsection