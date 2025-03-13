<?php

class Mahasiswa {
    private $nim;
    private $nama;

    function setData($nim, $nama){
        $this->nim = $nim;
        $this->nama = $nama;        
    }

    function getData(){
        return [
            'nim' => $this->nim,
            'nama' => $this->nama
        ];
    }

    function printData(){
        if (!empty($this->nim) && !empty($this->nama)) {
            echo "NIM: " . $this->nim . " | Nama: " . $this->nama . "<br>";
        } else {
            echo "<strong>Data kosong</strong><br>";
        }
    }
}
?>
