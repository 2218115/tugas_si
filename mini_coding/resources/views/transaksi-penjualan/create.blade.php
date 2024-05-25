@extends('layouts.admin-dashboard')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/vendors/choices.js/choices.min.css'); }}" />
@endsection

@section('script')
    <script>
        
        window.addEventListener('DOMContentLoaded', () => {
        
            let barangListJson = {{ Js::from($barangList) }};
            let poinListJson = {{ Js::from($poinList) }};
            let nilaiTukarPoin = {{ Js::from($nilaiTukarPoin) }};
            let konsumenOrPelangganJson = {{ Js::from($konsumenOrPelangganList) }};
            
            console.log(konsumenOrPelangganJson);
            
            const elDetailTransaksiContainer = document.getElementById('detailTransaksiContainer');
            const elGrandTotalNominal = document.getElementById('grandTotalNominal');
            const elNominalKembalian = document.getElementById('nominalKembalian');
            const elNominalPembayaran = document.getElementById('nominalPembayaran');
            const elAlertNominalPembayaran = document.getElementById('alertNominalPembayaran');
            const elSelectTukarPoin = document.getElementById('selectTukarPoin');
            const elSelectKonsumenOrPelanggan = document.getElementById('konsumenOrPelangganSelect');
            
            const konsumenOrPelangganChoices = new Choices(elSelectKonsumenOrPelanggan);
            konsumenOrPelangganChoices.setChoices(konsumenOrPelangganJson.map((konsumenOrPelanggan) => {
                return {
                    value: konsumenOrPelanggan.id_pengguna,
                    label: `${konsumenOrPelanggan.nama} } - ${konsumenOrPelanggan.role}`,
                };
            }));

            
            const poinChoices = new Choices(elSelectTukarPoin);
            
            elSelectKonsumenOrPelanggan.onchange = () => {
                const poins = [{
                    value: "false",
                    label: 'Tidak',
                    selected: true,
                }];
                const filtered = poinListJson.filter((poin) => poin.id_pelanggan == elSelectKonsumenOrPelanggan.value);
                if (filtered.length === 1) {
                        poins.push({
                        value: "true",
                        label: `Tukar - ${filtered[0].jumlah_poin} Poin - Diskon Rp. ${filtered[0].jumlah_poin * nilaiTukarPoin.nilai_tukar}`,
                        selected: false,
                    });    
                }
                
                poinChoices.clearChoices();
                poinChoices.setChoices(poins);
            }
            
            elSelectTukarPoin.onchange = () => {
                recalculateKembalian();
            }
                            
            
            elNominalPembayaran.onkeyup = () => {
                recalculateKembalian();
            }
            
            function recalculateKembalian() {
                let nominalKembalian = parseInt(elNominalPembayaran.value - elGrandTotalNominal.value);
                
                if (elSelectTukarPoin.value == "true") {
                    const filtered = poinListJson.filter((poin) => poin.id_pelanggan == elSelectKonsumenOrPelanggan.value);
                    if (filtered.length === 1) {
                        nominalKembalian += filtered[0].jumlah_poin * nilaiTukarPoin.nilai_tukar;
                    }
                }
                
                if (!isNaN(nominalKembalian)) {
                    elNominalKembalian.value = nominalKembalian;
                    if (nominalKembalian < 0) {
                        elAlertNominalPembayaran.style.display = "flex";
                    } else {
                        elAlertNominalPembayaran.style.display = "none";
                    }
                } else {
                    
                }                
            }
               
            function recalculateGrandTotalNominal() {
                let totalNominal = 0;
                
                const nominals = document.getElementsByName("totalNominal[]");
                for (let node of nominals) {
                    totalNominal += parseInt(node.value);
                }
                
                elGrandTotalNominal.value = totalNominal;
                
                recalculateKembalian();
            }
            
            function createDetailTransaksiForm() {
                let choice = null;
                let inputHarga = null;
                let inputJumlah = null;
                let inputTotalNominal = null;
                
                const elDetailTransaksi = document.createElement("div");
                elDetailTransaksi.classList.add("row");
                {
                    const divForm1 = document.createElement("div");
                    divForm1.classList.add("form-group", "col-3");
                    {
                        const label = document.createElement("label");
                        label.textContent = "Barang";
                        
                        choice = document.createElement("select");
                        choice.name = "barang[]";
                        choice.classList.add("form-control", "choices");
                        choice.onchange = () => {
                            if (inputHarga !== null && choice !== null) {
                                const selectedId = choice.value;
                                const filtered = barangListJson.filter((barang) => barang.id_barang == selectedId);
                                if (filtered.length === 1) {
                                    inputHarga.value = filtered[0].harga;
                                    
                                    if (inputJumlah !== null && inputTotalNominal !== null) {
                                        inputTotalNominal.value = inputHarga.value * inputJumlah.value;
                                        
                                        recalculateGrandTotalNominal();
                                    }
                                }
                            }
                        }
                        
                        divForm1.appendChild(label);
                        divForm1.appendChild(choice);
                    }
                    
                    
                    const divForm2 = document.createElement("div");
                    divForm2.classList.add("form-group", "col-3");
                    {
                        const label = document.createElement("label");
                        label.textContent = "Harga Barang";
                        
                        inputHarga = document.createElement("input");
                        inputHarga.classList.add("form-control");
                        inputHarga.name = "harga[]";
                        inputHarga.readOnly = true
                        
                        divForm2.appendChild(label);
                        divForm2.appendChild(inputHarga);
                    }
                    
                    const divForm3 = document.createElement("div");
                    divForm3.classList.add("form-group");
                    divForm3.classList.add("col-3");
                    {
                        const label = document.createElement("label");
                        label.textContent = "Jumlah Barang";
                        
                        inputJumlah = document.createElement("input");
                        inputJumlah.classList.add("form-control");
                        inputJumlah.value = 1;
                        inputJumlah.name = "jumlah[]";
                        
                        inputJumlah.onkeyup = () => {
                            if (inputHarga !== null && inputTotalNominal !== null) {
                                inputTotalNominal.value = inputHarga.value * inputJumlah.value;
                                
                                recalculateGrandTotalNominal();
                            }
                        }
                        
                        divForm3.appendChild(label);
                        divForm3.appendChild(inputJumlah);
                    }
                    
                    const divForm4 = document.createElement("div");
                    divForm4.classList.add("form-group");
                    divForm4.classList.add("col-3");
                    {
                        const label = document.createElement("label");
                        label.textContent = "Total Nominal Barang";
                        
                        inputTotalNominal = document.createElement("input");
                        inputTotalNominal.classList.add("form-control");
                        inputTotalNominal.readOnly = true;
                        inputTotalNominal.name = "totalNominal[]";
                        inputTotalNominal.value = 0;
                        
                                                
                        divForm4.appendChild(label);
                        divForm4.appendChild(inputTotalNominal);
                    }
                    
                    const divForm5 = document.createElement("div");
                    divForm5.classList.add("form-group");
                    divForm5.classList.add("col-3");
                    {
                        const buttonAdd = document.createElement("button");
                        buttonAdd.type = "button";
                        buttonAdd.textContent = "+";
                        buttonAdd.classList.add("btn", "btn-primary", "me-1", "mb-1");
                        
                        const buttonRemove = document.createElement("button");
                        buttonRemove.type = "button";
                        buttonRemove.textContent = "-";
                        buttonRemove.classList.add("btn", "btn-primary", "me-1", "mb-1");
                        
                        buttonAdd.onclick = () => {
                            const form = createDetailTransaksiForm();
                            elDetailTransaksiContainer.appendChild(form);
                            
                            recalculateGrandTotalNominal();
                        }
                        
                        buttonRemove.onclick = () => {
                            while (elDetailTransaksi.firstChild) {
                                elDetailTransaksi.removeChild(elDetailTransaksi.lastChild);;                                
                            }
                            elDetailTransaksi.remove();
                            
                            recalculateGrandTotalNominal();
                        }
                        
                        divForm5.appendChild(buttonAdd);
                        divForm5.appendChild(buttonRemove);
                    }
                    
                    elDetailTransaksi.appendChild(divForm1);
                    elDetailTransaksi.appendChild(divForm2);
                    elDetailTransaksi.appendChild(divForm3);
                    elDetailTransaksi.appendChild(divForm4);
                    elDetailTransaksi.appendChild(divForm5);
                    
                    if (choice !== null) {
                        const choices = new Choices(choice);
                        choices.setChoices(barangListJson.map((barang, index) => {
                            return {value: barang.id_barang, label: barang.nama};
                        }));  
                    }
                }
                                                  
                return elDetailTransaksi;
            }
            
            const form = createDetailTransaksiForm();
            elDetailTransaksiContainer.appendChild(form);
        });
    </script>
    
        <script src="{{ asset('assets/vendors/choices.js/choices.min.js'); }}"></script>
    
@endsection

@section('content')            
<div class="main-content container-fluid">
    <div class="page-title">
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Buat Transaksi</h4>
            </div>
            <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="/admin/transaksi-penjualan" method="POST">
                
                @csrf
                
                 
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="form-body">
                    <div class="row">
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="pelangganOrKonsumen">Pengguna</label>
                            <select class="form-control" name="pelangganOrKonsumen" id="konsumenOrPelangganSelect">
                            </select>
                                @error('pengguna')
                                    <div class="alert alert-light-danger color-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="jenisPembayaran">Jenis Pembayaran</label>                        
                            <select class="form-control choices" name="jenisPembayaran">
                                 @foreach($jenisPembayaranList as $jenisPembayaran)
                                    <option value="{{$jenisPembayaran->id_jenis_pembayaran}}"> {{ $jenisPembayaran->jenis }} </option>
                                @endforeach
                            </select>
                            @error('jenisPembayaran')
                                    <div class="alert alert-light-danger color-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="distributor">Distributor</label>                        
                            <select class="form-control choices" name="distributor">
                                @foreach($distributorList as $distributor)
                                    <option value="{{$distributor->id_pengguna}}"> {{ $distributor->nama }} </option>
                                @endforeach
                            </select>
                            @error('distributor')
                                    <div class="alert alert-light-danger color-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                
                    <h3>Data detail transaksi</h3>
                    <div id="detailTransaksiContainer">
                    </div>
                 
                     <div class="col-12">
                        <div class="form-group">
                            <h3 for="grandTotalNominal">Grand Total Nominal</h3>
                            <input type="text" name="grandTotalNominal" class="form-control" placeholder="Harga barang" readonly id="grandTotalNominal">
                        </div>
                    </div>
                    
                     <div class="col-12">
                        <div class="form-group">
                            <label for="nominalPembayaran">Nominal Pembayaran</label>
                            <input type="text" name="nominalPembayaran" class="form-control" placeholder="Masukkan nominal pembayaran" id="nominalPembayaran">
                            <div class="alert alert-light-danger color-danger mt-2" id="alertNominalPembayaran">Nominal Bayar tidak cukup</div>
                        </div>
                    </div>
                    
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nominalKembalian">Nominal Kembalian</label>
                            <input type="text" name="nominalKembalian" class="form-control" placeholder="Nominal Kembalian" id="nominalKembalian" readonly>
                        </div>
                    </div>
                    
                    
                    <h3>Tukar Poin</h3>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="tukarPoin">Tukar Poin</label>
                            <select class="form-control" name="tukarPoin" id="selectTukarPoin">
                            </select>
                        </div>
                    </div>
                    
                     
                    </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Buat Transaksi</button>
                            <a type="reset" class="btn btn-light-secondary me-1 mb-1" href="/admin/transaksi-penjualan">Batal</a>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>        
    </section>
</div>
@endsection
