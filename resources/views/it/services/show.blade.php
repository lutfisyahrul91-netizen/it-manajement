@extends('layouts.it_support')

@section('content')
<form action="#" method="POST" style="display: flex; flex-direction: column; gap: 24px; font-family: 'Inter', sans-serif;">
    <div style="background: white; border-radius: 12px; padding: 32px; box-shadow: 0px 4px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column; gap: 32px;">
        
        <div style="display: flex; gap: 24px; flex-wrap: wrap;">
            
            <div style="flex: 1 1 300px; background: rgba(217, 52, 56, 0.10); border-radius: 8px; display: flex; align-items: center; justify-content: center; min-height: 339px;">
                <div style="width: 78px; height: 78px; background: #B8BDC5; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                     <i class='bx bx-wrench' style="font-size: 32px; color: white;"></i>
                </div>
            </div>

            <div style="flex: 1 1 300px; display: flex; flex-direction: column; gap: 16px; justify-content: space-between;">
                
                <div style="background: #FAFAFA; border-radius: 8px; padding: 0 16px; height: 48px; display: flex; align-items: center; justify-content: space-between; border: 1px solid #E9EAEC; box-sizing: border-box;">
                    <span style="color: #657081; font-size: 12px; font-weight: 600;">No Seri</span>
                    <span style="color: #21252B; font-size: 14px; font-weight: 700;">{{ $asset->no_seri ?? $service->no_seri_barang }}</span>
                </div>

                <div style="background: #FAFAFA; border-radius: 8px; padding: 0 16px; height: 48px; display: flex; align-items: center; justify-content: space-between; border: 1px solid #E9EAEC; box-sizing: border-box;">
                    <span style="color: #657081; font-size: 12px; font-weight: 600;">Merk</span>
                    <span style="color: #21252B; font-size: 14px; font-weight: 700;">{{ $asset->merk ?? 'Data Tidak Ditemukan' }}</span>
                </div>

                <div style="background: #FAFAFA; border-radius: 8px; padding: 0 16px; height: 48px; display: flex; align-items: center; justify-content: space-between; border: 1px solid #E9EAEC; box-sizing: border-box;">
                    <span style="color: #657081; font-size: 12px; font-weight: 600;">Tahun Pengadaan</span>
                    <span style="color: #21252B; font-size: 14px; font-weight: 700;">{{ $asset->tahun_pengadaan ?? '-' }}</span>
                </div>

                <div style="background: #FAFAFA; border-radius: 8px; padding: 0 16px; height: 48px; display: flex; align-items: center; justify-content: space-between; border: 1px solid #E9EAEC; box-sizing: border-box;">
                    <span style="color: #657081; font-size: 12px; font-weight: 600;">Pemeliharaan</span>
                    <span style="color: #21252B; font-size: 14px; font-weight: 700;">{{ $asset->pemeliharaan ?? '-' }}</span>
                </div>

                <div style="background: #FAFAFA; border-radius: 8px; padding: 0 16px; height: 48px; display: flex; align-items: center; justify-content: space-between; border: 1px solid #E9EAEC; box-sizing: border-box;">
                    <span style="color: #657081; font-size: 12px; font-weight: 600;">Kondisi Aset</span>
                    <span style="color: #21252B; font-size: 14px; font-weight: 700;">{{ $asset->kondisi ?? $service->kondisi ?? '-' }}</span>
                </div>

            </div>

            <div style="flex: 1 1 300px; display: flex; flex-direction: column; gap: 16px; justify-content: space-between;">
                
                <div style="background: #FAFAFA; border-radius: 8px; padding: 16px; height: 100%; min-height: 269px; color: #21252B; display: flex; flex-direction: column; gap: 8px; border: 1px solid #E9EAEC; box-sizing: border-box;">
                    <span style="font-size: 12px; font-weight: 600; color: #657081;">Update Service Terakhir:</span>
                    <span style="font-size: 14px; line-height: 1.5;">{{ $service->catatan_service ?? 'Belum ada riwayat update service untuk perangkat ini.' }}</span>
                </div>
                
                <div style="background: #FAFAFA; border-radius: 8px; padding: 0 16px; height: 48px; display: flex; align-items: center; justify-content: space-between; border: 1px solid #E9EAEC; box-sizing: border-box;">
                    <span style="font-size: 12px; font-weight: 600; color: #657081;">Tim IT Sebelumnya:</span>
                    <span style="font-size: 14px; font-weight: 700; color: #21252B;">{{ $service->ditangani_oleh ?? 'Belum Ditugaskan' }}</span>
                </div>

            </div>
        </div>

        <div style="display: flex; flex-direction: column; gap: 20px;">
            
            <div style="background: #FAFAFA; border-radius: 8px; padding: 16px; height: 158px; display: flex; flex-direction: column; gap: 8px; border: 1px solid #E9EAEC; box-sizing: border-box;">
                <span style="font-size: 12px; font-weight: 600; color: #657081;">Update Progress Service Baru</span>
                <textarea name="catatan_service_baru" placeholder="Isikan detail tindakan perbaikan di sini..." style="width: 100%; height: 100%; border: none; background: transparent; outline: none; font-family: 'Inter'; color: #21252B; resize: none; font-size: 14px;"></textarea>
            </div>
            
            <div style="background: #F3F3F3; border-radius: 8px; padding: 0 16px; height: 60px; display: flex; align-items: center; justify-content: space-between; border: 1px solid #E9EAEC; box-sizing: border-box;">
                <span style="font-size: 12px; font-weight: 600; color: #657081;">Ditangani Oleh (Tim IT)</span>
                <input type="text" name="ditangani_oleh" value="{{ auth()->user()->nama_user ?? auth()->user()->username }}" readonly style="border: none; background: transparent; outline: none; font-family: 'Inter'; color: #21252B; font-size: 14px; font-weight: 700; text-align: right; width: 250px;">
            </div>

        </div>

        <div style="display: flex; justify-content: flex-end; gap: 16px; margin-top: 12px;">
            <a href="{{ route('it.service') }}" style="text-decoration: none; width: 94px; height: 38px; background: white; border: 1px solid #D30007; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #D30007; font-family: 'Montserrat'; font-weight: 600; font-size: 14px; transition: all 0.2s ease;">
                Back
            </a>
            <button type="submit" style="border: none; cursor: pointer; width: 111px; height: 38px; background: #D30007; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-family: 'Montserrat'; font-weight: 600; font-size: 14px; transition: background 0.2s ease;" onmouseover="this.style.background='#b00006'" onmouseout="this.style.background='#D30007'">
                Update
            </button>
        </div>

    </div>
</form>
@endsection