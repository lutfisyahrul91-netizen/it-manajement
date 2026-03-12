@extends('layouts.admin')

@section('content')
<div style="display: flex; flex-direction: column; gap: 24px; font-family: 'Inter', sans-serif;">
    
    <div style="display: flex; justify-content: space-between; align-items: center; background: white; padding: 24px 32px; border-radius: 12px; border-bottom: 1px solid #E9EAEC; flex-wrap: wrap; gap: 16px;">
        <h2 style="font-weight: 700; color: #21252B; margin: 0; font-size: 20px;">Detail & Update Monitor</h2>
        
        <div style="display: flex; align-items: center; gap: 10px;">
            <div style="width: 32px; height: 32px; background: #FAFAFA; border-radius: 8px; display: flex; align-items: center; justify-content: center; border: 1px solid #E9EAEC;">
                <i class='bx bx-bell' style="font-size: 16px; color: #21252B;"></i>
            </div>
            <img src="https://placehold.co/32x32" style="width: 32px; height: 32px; border-radius: 50%; object-fit: cover;" alt="Profile" />
            
        </div>
    </div>

    <div style="background: white; border-radius: 12px; padding: 32px; box-shadow: 0px 4px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column; gap: 32px;">
        
        <div style="display: flex; gap: 24px; flex-wrap: wrap;">
            
            <div style="flex: 1 1 250px; background: rgba(217, 52, 56, 0.10); border-radius: 8px; display: flex; align-items: center; justify-content: center; min-height: 250px;">
                <div style="width: 78px; height: 78px; background: #B8BDC5; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                    <i class='bx bx-desktop' style="font-size: 32px; color: white;"></i>
                </div>
            </div>

            <div style="flex: 1 1 300px; display: flex; flex-direction: column; gap: 20px; justify-content: flex-start;">
                
                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <label style="font-size: 12px; font-weight: 600; color: #657081; font-family: 'Montserrat';">No Seri</label>
                    <div style="background: #F3F3F3; border-radius: 8px; padding: 0 16px; height: 48px; display: flex; align-items: center; border: 1px solid #E9EAEC; box-sizing: border-box;">
                        <span style="color: #21252B; font-size: 14px; font-weight: 600;">{{ $monitor->no_seri }}</span>
                    </div>
                </div>

                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <label style="font-size: 12px; font-weight: 600; color: #657081; font-family: 'Montserrat';">Merk</label>
                    <div style="background: #FAFAFA; border-radius: 8px; padding: 0 16px; height: 48px; display: flex; align-items: center; border: 1px solid #E9EAEC; box-sizing: border-box;">
                        <input type="text" value="{{ $monitor->merk }}" style="border: none; background: transparent; outline: none; width: 100%; color: #21252B; font-family: 'Inter'; font-size: 14px;">
                    </div>
                </div>

                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <label style="font-size: 12px; font-weight: 600; color: #657081; font-family: 'Montserrat';">Tahun Pengadaan</label>
                    <div style="background: #FAFAFA; border-radius: 8px; padding: 0 16px; height: 48px; display: flex; align-items: center; border: 1px solid #E9EAEC; box-sizing: border-box;">
                        <input type="number" value="{{ $monitor->tahun_pengadaan }}" style="border: none; background: transparent; outline: none; width: 100%; color: #21252B; font-family: 'Inter'; font-size: 14px;">
                    </div>
                </div>

            </div>

            <div style="flex: 1 1 300px; display: flex; flex-direction: column; gap: 20px; justify-content: flex-start;">
                
                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <label style="font-size: 12px; font-weight: 600; color: #657081; font-family: 'Montserrat';">Tanggal Pemeliharaan</label>
                    <div style="background: #FAFAFA; border-radius: 8px; padding: 0 16px; height: 48px; display: flex; align-items: center; border: 1px solid #E9EAEC; box-sizing: border-box;">
                        <input type="date" value="{{ $monitor->pemeliharaan }}" style="border: none; background: transparent; outline: none; width: 100%; color: #21252B; font-family: 'Inter'; font-size: 14px;">
                    </div>
                </div>

                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <label style="font-size: 12px; font-weight: 600; color: #657081; font-family: 'Montserrat';">Kondisi</label>
                    <div style="background: #FAFAFA; border-radius: 8px; padding: 0 16px; height: 48px; display: flex; align-items: center; border: 1px solid #E9EAEC; box-sizing: border-box;">
                        <select style="border: none; background: transparent; outline: none; width: 100%; color: #21252B; font-family: 'Inter'; font-size: 14px; cursor: pointer;">
                            <option value="Baik" {{ $monitor->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                            <option value="Pemeliharaan" {{ $monitor->kondisi == 'Pemeliharaan' ? 'selected' : '' }}>Pemeliharaan</option>
                            <option value="Rusak" {{ $monitor->kondisi == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                        </select>
                    </div>
                </div>

                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <label style="font-size: 12px; font-weight: 600; color: #657081; font-family: 'Montserrat';">Jumlah</label>
                    <div style="background: #FAFAFA; border-radius: 8px; padding: 0 16px; height: 48px; display: flex; align-items: center; border: 1px solid #E9EAEC; box-sizing: border-box;">
                        <input type="number" value="{{ $monitor->jumlah }}" style="border: none; background: transparent; outline: none; width: 100%; color: #21252B; font-family: 'Inter'; font-size: 14px;">
                    </div>
                </div>

            </div>
        </div>

        <div style="display: flex; justify-content: flex-end; gap: 16px; margin-top: 12px;">
            <a href="{{ route('admin.monitor') }}" style="text-decoration: none; width: 94px; height: 38px; background: white; border: 1px solid #D30007; border-radius: 8px; display: flex; align-items: center; justify-content: center; gap: 6px; color: #D30007; font-family: 'Montserrat'; font-weight: 600; font-size: 14px; transition: all 0.2s ease;">
                <i class='bx bx-arrow-back'></i> Back
            </a>
            
            <button type="submit" style="border: none; cursor: pointer; width: 111px; height: 38px; background: #D30007; border-radius: 8px; display: flex; align-items: center; justify-content: center; gap: 6px; color: white; font-family: 'Montserrat'; font-weight: 600; font-size: 14px; transition: background 0.2s ease;" onmouseover="this.style.background='#b00006'" onmouseout="this.style.background='#D30007'">
                <i class='bx bx-save'></i> Save
            </button>
        </div>

    </div>
</div>
@endsection