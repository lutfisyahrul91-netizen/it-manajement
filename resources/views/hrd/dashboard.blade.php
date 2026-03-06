@extends('layouts.hrd')

@section('content')
<div style="display: flex; flex-direction: column; gap: 32px; font-family: 'Inter', sans-serif;">

    <div style="display: flex; gap: 24px; flex-wrap: wrap;">
        
        <div style="flex: 1 1 300px; padding: 20px 24px; background: white; box-shadow: 0px 4px 20px rgba(0,0,0,0.05); border-radius: 8px; display: flex; flex-direction: column; gap: 20px;">
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #F3F3F3; padding-bottom: 12px;">
                <div style="color: #191919; font-size: 22px; font-weight: 800;">{{ number_format($totalSemua, 0, ',', '.') }}</div>
                <div style="color: #525256; font-size: 14px; font-weight: 500;">Semua Aset</div>
            </div>
            <div style="background: #D30007; padding: 16px; border-radius: 4px; display: flex; justify-content: space-between; align-items: center;">
                <div style="display: flex; flex-direction: column; gap: 4px;">
                    <span style="color: rgba(255,255,255,0.7); font-size: 14px; font-weight: 500;">Aset IT</span>
                    <span style="color: white; font-size: 16px; font-weight: 700;">Semua Aset</span>
                </div>
                <div style="display: flex; align-items: center; gap: 12px;">
                    <span style="color: white; font-size: 16px; font-weight: 700;">100%</span>
                    <div style="background: white; border-radius: 20px; padding: 4px; display: flex; align-items: center; justify-content: center;">
                        <i class='bx bx-check' style="color: #299D91; font-size: 16px;"></i>
                    </div>
                </div>
            </div>
        </div>

        <div style="flex: 1 1 300px; padding: 20px 24px; background: white; box-shadow: 0px 4px 20px rgba(0,0,0,0.05); border-radius: 8px; display: flex; flex-direction: column; gap: 20px;">
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #F3F3F3; padding-bottom: 12px;">
                <div style="color: #191919; font-size: 22px; font-weight: 800;">{{ number_format($totalBaik, 0, ',', '.') }}</div>
                <div style="color: #525256; font-size: 14px; font-weight: 500;">Aset Baik</div>
            </div>
            <div style="background: #D30007; padding: 16px; border-radius: 4px; display: flex; justify-content: space-between; align-items: center;">
                <div style="display: flex; flex-direction: column; gap: 4px;">
                    <span style="color: rgba(255,255,255,0.7); font-size: 14px; font-weight: 500;">Aset IT</span>
                    <span style="color: white; font-size: 16px; font-weight: 700;">Kondisi Baik</span>
                </div>
                <div style="display: flex; align-items: center; gap: 12px;">
                    <span style="color: white; font-size: 16px; font-weight: 700;">{{ $persenBaik }}%</span>
                    <div style="background: white; border-radius: 20px; padding: 4px; display: flex; align-items: center; justify-content: center;">
                        <i class='bx bx-trending-up' style="color: #299D91; font-size: 16px;"></i>
                    </div>
                </div>
            </div>
        </div>

        <div style="flex: 1 1 300px; padding: 20px 24px; background: white; box-shadow: 0px 4px 20px rgba(0,0,0,0.05); border-radius: 8px; display: flex; flex-direction: column; gap: 20px;">
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #F3F3F3; padding-bottom: 12px;">
                <div style="color: #191919; font-size: 22px; font-weight: 800;">{{ number_format($totalPemeliharaan, 0, ',', '.') }}</div>
                <div style="color: #525256; font-size: 14px; font-weight: 500;">Pemeliharaan</div>
            </div>
            <div style="background: #D30007; padding: 16px; border-radius: 4px; display: flex; justify-content: space-between; align-items: center;">
                <div style="display: flex; flex-direction: column; gap: 4px;">
                    <span style="color: rgba(255,255,255,0.7); font-size: 14px; font-weight: 500;">Aset IT</span>
                    <span style="color: white; font-size: 16px; font-weight: 700;">Pemeliharaan</span>
                </div>
                <div style="display: flex; align-items: center; gap: 12px;">
                    <span style="color: white; font-size: 16px; font-weight: 700;">{{ $persenPemeliharaan }}%</span>
                    <div style="background: white; border-radius: 20px; padding: 4px; display: flex; align-items: center; justify-content: center;">
                        <i class='bx bx-wrench' style="color: #299D91; font-size: 16px;"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div style="background: white; padding: 24px; border-radius: 8px; box-shadow: 0px 4px 20px rgba(0,0,0,0.05);">
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; flex-wrap: wrap; gap: 16px;">
            <div style="display: flex; align-items: center; gap: 12px; font-family: 'Montserrat', sans-serif;">
                <span style="font-size: 12px; font-weight: 500;">Show</span>
                <select style="background: #E0E0E0; border: none; padding: 8px 12px; border-radius: 8px; font-size: 12px; font-weight: 500; outline: none;">
                    <option>10</option>
                </select>
                <span style="font-size: 12px; font-weight: 500;">entries</span>
            </div>
            <div style="display: flex; align-items: center; gap: 24px;">
                <div style="display: flex; align-items: center; gap: 8px; border: 1px solid #9E9E9E; padding: 8px 12px; border-radius: 8px;">
                    <i class='bx bx-search' style="color: #9E9E9E;"></i>
                    <input type="text" placeholder="Search..." style="border: none; outline: none; font-family: 'Montserrat'; font-size: 12px; color: #9E9E9E;">
                </div>
                <span style="font-family: 'Montserrat'; font-size: 12px; font-weight: 500; color: black;">Recent History</span>
            </div>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; font-family: 'Montserrat', sans-serif; min-width: 900px;">
                <thead>
                    <tr style="text-align: left; border-bottom: 1px solid #E9EAEC;">
                        <th style="padding: 16px; font-size: 14px; font-weight: 700; text-align: center;">No. Seri</th>
                        <th style="padding: 16px; font-size: 14px; font-weight: 700;">Merk</th>
                        <th style="padding: 16px; font-size: 14px; font-weight: 700;">Tahun Pengadaan</th>
                        <th style="padding: 16px; font-size: 14px; font-weight: 700;">Pemeliharaan</th>
                        <th style="padding: 16px; font-size: 14px; font-weight: 700;">Jumlah</th>
                        <th style="padding: 16px; font-size: 14px; font-weight: 700;">Kondisi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($history as $item)
                    <tr style="background: {{ $loop->index % 2 == 0 ? '#F7F6FE' : 'white' }}; border-bottom: 1px solid #E9EAEC;">
                        <td style="padding: 16px; font-size: 14px; font-weight: 500; text-align: center;">{{ $item->no_seri }}</td>
                        
                        <td style="padding: 16px; font-size: 14px; font-weight: 500; display: flex; align-items: center; gap: 8px;">
                            <div style="width: 32px; height: 32px; background: #C4C4C4; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                @if($item->jenis == 'Laptop')
                                    <i class='bx bx-laptop' style="color: white; font-size: 16px;"></i>
                                @elseif($item->jenis == 'PC' || $item->jenis == 'Monitor')
                                    <i class='bx bx-desktop' style="color: white; font-size: 16px;"></i>
                                @else
                                    <i class='bx bx-devices' style="color: white; font-size: 16px;"></i>
                                @endif
                            </div>
                            <div style="display: flex; flex-direction: column;">
                                <span>{{ $item->merk }}</span>
                                <span style="font-size: 10px; color: #9E9E9E; font-weight: 600;">{{ $item->jenis }}</span>
                            </div>
                        </td>
                        
                        <td style="padding: 16px; font-size: 14px; font-weight: 500;">{{ $item->tahun_pengadaan }}</td>
                        <td style="padding: 16px; font-size: 14px; font-weight: 500;">{{ $item->pemeliharaan }}</td>
                        
                        <td style="padding: 16px;">
                            <span style="background: #EBF9F1; color: #1F9254; font-size: 12px; font-weight: 500; padding: 6px 14px; border-radius: 20px;">
                                {{ $item->jumlah }} Unit
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
                    @empty
                    <tr>
                        <td colspan="7" style="padding: 24px; text-align: center; color: #9E9E9E; font-weight: 500;">Belum ada data history aset.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="display: flex; justify-content: center; align-items: center; gap: 12px; margin-top: 24px;">
            <span style="color: #9E9E9E; font-size: 12px; font-family: 'Montserrat'; font-weight: 500;">Previous</span>
            <div style="padding: 8px 12px; background: #624DE3; color: white; border-radius: 8px; font-size: 12px; font-family: 'Montserrat'; font-weight: 500;">1</div>
            <div style="padding: 8px 12px; background: #E0E0E0; color: black; border-radius: 8px; font-size: 12px; font-family: 'Montserrat'; font-weight: 500;">2</div>
            <span style="color: #9E9E9E; font-size: 12px; font-family: 'Montserrat'; font-weight: 500;">Next</span>
        </div>

    </div>
</div>
@endsection