<?php

		$this->fpdf->Open();
		$this->fpdf->AddPage("L",'A4');

        //$this->fpdf->Image('assets/images/logo.png',170,5,33);
        $this->fpdf->SetFont('Arial','B',20);
        $this->fpdf->Cell(0,20,"LAPORAN DATA GURU",0,1,'C');
        $this->fpdf->SetFillColor(128,128,128);
       // $this->fpdf->Cell(15,10, "No",1,0,"L",1,"C");
         $this->fpdf->SetFont('Arial','B',12);
        $no = 1;
        $this->fpdf->Cell(15,10, "No",1,0,"L",1);
        $this->fpdf->Cell(30,10, "NIP",1,0,"L",1);
        $this->fpdf->Cell(70,10, "Nama",1,0,"L",1);
        $this->fpdf->Cell(25,10, "JK",1,0,"L",1);
        $this->fpdf->Cell(20,10, "Agama",1,0,"L",1);
        $this->fpdf->Cell(60,10, "TTL",1,0,"L",1);
        $this->fpdf->Cell(40,10, "Alamat",1,0,"L",1);
       
        foreach($data_guru->result() as $db)
		{
            $this->fpdf->Ln();
            $this->fpdf->SetFont('Arial','',12);
            $this->fpdf->Cell(15  , 10, $no  ,1,0,"L");
   		    $this->fpdf->Cell(30  , 10, $db->nip  ,1,0,"L");
    	    $this->fpdf->Cell(70 , 10, $db->nama ,1,0,"L");
            $this->fpdf->Cell(25 , 10, $db->jenis_kelamin ,1,0,"L");
            $this->fpdf->Cell(20 , 10, $db->agama ,1,0,"L");
            $this->fpdf->Cell(60 , 10, $db->tempat_lahir.",".$db->tanggal_lahir  ,1,0,"L");
            $this->fpdf->Cell(40 , 10, $db->alamat_lengkap ,1,0,"L");
        $no++;
        }

		$this->fpdf->Output('output.pdf','D');
