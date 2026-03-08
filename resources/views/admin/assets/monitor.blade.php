@extends('layouts.admin')

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

            <!-- <button style="background: #D30007; color: white; border: none; padding: 10px 16px; border-radius: 8px; font-family: 'Montserrat'; font-weight: 700; font-size: 12px; cursor: pointer; display: flex; align-items: center; gap: 8px; transition: background 0.2s;" onmouseover="this.style.background='#b00006'" onmouseout="this.style.background='#D30007'">
                <i class='bx bx-plus' style="font-size: 16px;"></i> Tambahkan Monitor
            </button> -->
            <div style="display: flex; gap: 12px; align-items: center;">
    
                <button onclick="document.getElementById('modalImport').style.display='flex'" style="background: #1F9254; color: white; border: none; padding: 10px 16px; border-radius: 8px; font-family: 'Montserrat'; font-weight: 700; font-size: 12px; cursor: pointer; display: flex; align-items: center; gap: 8px;">
                        <i class='bx bx-file-blank'></i> Import Excel
                </button>

                <button onclick="document.getElementById('modalTambah').style.display='flex'" style="background: #D30007; color: white; border: none; padding: 10px 16px; border-radius: 8px; font-family: 'Montserrat'; font-weight: 700; font-size: 12px; cursor: pointer; display: flex; align-items: center; gap: 8px; transition: background 0.2s;" onmouseover="this.style.background='#b00006'" onmouseout="this.style.background='#D30007'">
                    <i class='bx bx-plus' style="font-size: 16px;"></i> Tambahkan Monitor
                </button>

            </div>

            <div id="modalImport" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; justify-content: center; align-items: center;">
                    <div style="background: white; padding: 32px; border-radius: 12px; width: 400px; box-shadow: 0px 10px 30px rgba(0,0,0,0.1);">
                        <h3 style="margin-top: 0; font-family: 'Montserrat'; font-weight: 700;">Import Data Monitor</h3>
                            <p style="font-size: 12px; color: #657081; margin-bottom: 20px;">Pilih file .xlsx yang berisi data monitor sesuai format.</p>
        
                                <form action="{{ route('admin.monitor.import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <input type="file" name="file_excel" required style="margin-bottom: 20px; font-size: 13px;">
            
                                        <div style="display: flex; justify-content: flex-end; gap: 12px;">
                                                <button type="button" onclick="document.getElementById('modalImport').style.display='none'" style="background: transparent; border: 1px solid #D30007; color: #D30007; padding: 8px 16px; border-radius: 6px; cursor: pointer; font-weight: 600;">Batal</button>
                                                <button type="submit" style="background: #D30007; border: none; color: white; padding: 8px 16px; border-radius: 6px; cursor: pointer; font-weight: 600;">Upload Sekarang</button>
                                        </div>
                                </form>
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
                        <th style="padding: 16px; font-size: 14px; font-weight: 700; color: black; text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($monitors as $item)
                    <tr style="background: {{ $loop->index % 2 == 0 ? '#F7F6FE' : 'white' }}; border-bottom: 1px solid #E9EAEC;">
                        
                        <td style="padding: 16px; font-size: 14px; font-weight: 500; text-align: center; color: black;">{{ $item->no_seri }}</td>
                        <td style="padding: 16px; font-size: 14px; font-weight: 500; color: black; display: flex; align-items: center; gap: 8px;">
                            <div style="width: 32px; height: 32px; background: #C4C4C4; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                <i class='bx bx-desktop' style="color: white; font-size: 16px;"></i>
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
                        <td style="padding: 16px; text-align: center;">
                            <div style="display: flex; justify-content: center; gap: 12px;">
                                <a href="{{ route('admin.monitor.show', str_replace('#', '', $item->no_seri)) }}" style="text-decoration: none; width: 24px; height: 24px; background: transparent; border: 2px solid #624DE3; border-radius: 4px; display: flex; justify-content: center; align-items: center; transition: background 0.2s;" onmouseover="this.style.background='#624DE3'; this.children[0].style.color='white';" onmouseout="this.style.background='transparent'; this.children[0].style.color='#624DE3';">
                                    <i class='bx bx-edit-alt' style="color: #624DE3; font-size: 14px; transition: color 0.2s;"></i>
                                </a>

                                <form action="{{ route('admin.monitor.destroy', str_replace('#', '', $item->no_seri)) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data Monitor {{ $item->no_seri }} secara permanen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="width: 24px; height: 24px; background: transparent; border: 2px solid #A30D11; border-radius: 4px; cursor: pointer; display: flex; justify-content: center; align-items: center; transition: background 0.2s;" onmouseover="this.style.background='#A30D11'; this.children[0].style.color='white';" onmouseout="this.style.background='transparent'; this.children[0].style.color='#A30D11';">
                                        <i class='bx bx-trash' style="color: #A30D11; font-size: 14px; transition: color 0.2s;"></i>
                                    </button>
                                </form>
                            </div>
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

<div id="modalTambah" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; justify-content: center; align-items: center; font-family: 'Inter', sans-serif;">
    <div style="background: white; padding: 32px; border-radius: 12px; width: 450px; box-shadow: 0px 10px 30px rgba(0,0,0,0.1);">
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <h3 style="margin: 0; font-family: 'Montserrat'; font-weight: 700; font-size: 18px; color: #21252B;">Tambah Data Monitor</h3>
            <i class='bx bx-x' onclick="document.getElementById('modalTambah').style.display='none'" style="font-size: 24px; cursor: pointer; color: #9E9E9E;"></i>
        </div>
        
        <form action="{{ route('admin.monitor.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 16px;">
            @csrf <div style="display: flex; flex-direction: column; gap: 6px;">
                <label style="font-size: 12px; font-weight: 600; color: #657081;">No. Seri Barang <span style="color: red;">*</span></label>
                <input type="text" name="no_seri" required placeholder="Contoh: SN-MON-001" style="width: 100%; padding: 10px 14px; border: 1px solid #E9EAEC; border-radius: 8px; box-sizing: border-box; outline: none; font-size: 13px;">
            </div>

            <div style="display: flex; flex-direction: column; gap: 6px;">
                <label style="font-size: 12px; font-weight: 600; color: #657081;">Merk Monitor <span style="color: red;">*</span></label>
                <input type="text" name="merk" required placeholder="Contoh: Samsung 24 Inch" style="width: 100%; padding: 10px 14px; border: 1px solid #E9EAEC; border-radius: 8px; box-sizing: border-box; outline: none; font-size: 13px;">
            </div>

            <div style="display: flex; gap: 16px;">
                <div style="flex: 1; display: flex; flex-direction: column; gap: 6px;">
                    <label style="font-size: 12px; font-weight: 600; color: #657081;">Tahun Pengadaan <span style="color: red;">*</span></label>
                    <input type="number" name="tahun_pengadaan" required placeholder="Contoh: 2023" style="width: 100%; padding: 10px 14px; border: 1px solid #E9EAEC; border-radius: 8px; box-sizing: border-box; outline: none; font-size: 13px;">
                </div>
                <div style="flex: 1; display: flex; flex-direction: column; gap: 6px;">
                    <label style="font-size: 12px; font-weight: 600; color: #657081;">Jumlah Unit <span style="color: red;">*</span></label>
                    <input type="number" name="jumlah" required placeholder="Contoh: 1" style="width: 100%; padding: 10px 14px; border: 1px solid #E9EAEC; border-radius: 8px; box-sizing: border-box; outline: none; font-size: 13px;">
                </div>
            </div>

            <div style="display: flex; flex-direction: column; gap: 6px;">
                <label style="font-size: 12px; font-weight: 600; color: #657081;">Tgl Pemeliharaan Terakhir</label>
                <input type="date" name="pemeliharaan" style="width: 100%; padding: 10px 14px; border: 1px solid #E9EAEC; border-radius: 8px; box-sizing: border-box; outline: none; font-size: 13px; color: #21252B;">
            </div>

            <div style="display: flex; flex-direction: column; gap: 6px;">
                <label style="font-size: 12px; font-weight: 600; color: #657081;">Kondisi Aset <span style="color: red;">*</span></label>
                <select name="kondisi" required style="width: 100%; padding: 10px 14px; border: 1px solid #E9EAEC; border-radius: 8px; box-sizing: border-box; outline: none; font-size: 13px; background: white; cursor: pointer;">
                    <option value="Baik">Baik</option>
                    <option value="Pemeliharaan">Pemeliharaan (Sedang Diservis)</option>
                    <option value="Rusak">Rusak</option>
                </select>
            </div>
            
            <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 16px;">
                <button type="button" onclick="document.getElementById('modalTambah').style.display='none'" style="background: transparent; border: 1px solid #D30007; color: #D30007; padding: 10px 20px; border-radius: 8px; cursor: pointer; font-weight: 600; font-family: 'Montserrat'; font-size: 12px;">Batal</button>
                <button type="submit" style="background: #D30007; border: none; color: white; padding: 10px 20px; border-radius: 8px; cursor: pointer; font-weight: 600; font-family: 'Montserrat'; font-size: 12px;">Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection