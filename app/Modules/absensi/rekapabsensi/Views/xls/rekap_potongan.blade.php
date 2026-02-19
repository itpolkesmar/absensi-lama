<?php

$unitkerja = \DB::table('mst_unit')->where('id', $id_unit)->first();
$unitkerja = $unitkerja ? $unitkerja->nama : '';
$namabulan = getBulan( (int)$bulan );

$cetak = "
    <?xml version=\"1.0\"?>
    <Workbook xmlns=\"urn:schemas-microsoft-com:office:spreadsheet\"
     xmlns:o=\"urn:schemas-microsoft-com:office:office\"
     xmlns:x=\"urn:schemas-microsoft-com:office:excel\"
     xmlns:ss=\"urn:schemas-microsoft-com:office:spreadsheet\"
     xmlns:html=\"http://www.w3.org/TR/REC-html40\">
     <DocumentProperties xmlns=\"urn:schemas-microsoft-com:office:office\">
      <Author>Microsoft Office User</Author>
      <LastAuthor>Microsoft Office User</LastAuthor>
      <Created>2017-05-08T00:40:55Z</Created>
      <LastSaved>2017-05-08T00:48:50Z</LastSaved>
      <Version>15.0</Version>
     </DocumentProperties>
     <OfficeDocumentSettings xmlns=\"urn:schemas-microsoft-com:office:office\">
      <AllowPNG/>
      <PixelsPerInch>96</PixelsPerInch>
     </OfficeDocumentSettings>
     <ExcelWorkbook xmlns=\"urn:schemas-microsoft-com:office:excel\">
      <WindowHeight>16000</WindowHeight>
      <WindowWidth>25600</WindowWidth>
      <WindowTopX>0</WindowTopX>
      <WindowTopY>0</WindowTopY>
      <ProtectStructure>False</ProtectStructure>
      <ProtectWindows>False</ProtectWindows>
     </ExcelWorkbook>
     <Styles>
      <Style ss:ID=\"Default\" ss:Name=\"Normal\">
       <Alignment ss:Vertical=\"Bottom\"/>
       <Borders/>
       <Font ss:FontName=\"Calibri\" x:Family=\"Swiss\" ss:Size=\"12\" ss:Color=\"#000000\"/>
       <Interior/>
       <NumberFormat/>
       <Protection/>
      </Style>
      <Style ss:ID=\"m5862848\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\" ss:WrapText=\"1\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font x:Family=\"Swiss\" ss:Size=\"9\" ss:Bold=\"1\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"m5862908\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\" ss:WrapText=\"1\"/>
       <Borders>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font ss:FontName=\"Calibri\" x:Family=\"Swiss\" ss:Size=\"11\" ss:Color=\"#000000\"
        ss:Bold=\"1\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"m5859104\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\" ss:WrapText=\"1\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font x:Family=\"Swiss\" ss:Size=\"9\" ss:Bold=\"1\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"m5859124\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\" ss:WrapText=\"1\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font x:Family=\"Swiss\" ss:Size=\"9\" ss:Bold=\"1\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"m5859144\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\" ss:WrapText=\"1\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font x:Family=\"Swiss\" ss:Size=\"9\" ss:Bold=\"1\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"m5859164\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\" ss:WrapText=\"1\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font x:Family=\"Swiss\" ss:Size=\"9\" ss:Bold=\"1\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"m5859184\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\" ss:WrapText=\"1\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font x:Family=\"Swiss\" ss:Size=\"9\" ss:Bold=\"1\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"m5859204\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\" ss:WrapText=\"1\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font x:Family=\"Swiss\" ss:Size=\"9\" ss:Bold=\"1\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"m5879072\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font x:Family=\"Swiss\" ss:Size=\"9\" ss:Bold=\"1\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"m5879092\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\" ss:WrapText=\"1\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font x:Family=\"Swiss\" ss:Size=\"9\" ss:Bold=\"1\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"m5879112\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\" ss:WrapText=\"1\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font x:Family=\"Swiss\" ss:Size=\"9\" ss:Bold=\"1\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"m5879132\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\" ss:WrapText=\"1\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font x:Family=\"Swiss\" ss:Size=\"9\" ss:Bold=\"1\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"m5879152\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\" ss:WrapText=\"1\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font x:Family=\"Swiss\" ss:Size=\"9\" ss:Bold=\"1\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"m5879172\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\" ss:WrapText=\"1\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font x:Family=\"Swiss\" ss:Size=\"9\" ss:Bold=\"1\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"s65\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\" ss:WrapText=\"1\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font x:Family=\"Swiss\" ss:Size=\"9\" ss:Bold=\"1\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"s68\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\" ss:WrapText=\"1\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font x:Family=\"Swiss\" ss:Size=\"9\" ss:Bold=\"1\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"s69\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\" ss:WrapText=\"1\"/>
       <Borders>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font x:Family=\"Swiss\" ss:Size=\"9\" ss:Bold=\"1\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"s86\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\" ss:WrapText=\"1\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font x:Family=\"Swiss\" ss:Size=\"9\" ss:Bold=\"1\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"s87\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font x:Family=\"Swiss\" ss:Size=\"9\" ss:Bold=\"1\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"s88\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font x:Family=\"Swiss\" ss:Size=\"9\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"s92\">
       <Alignment ss:Vertical=\"Center\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font x:Family=\"Swiss\" ss:Size=\"9\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"s100\">
       <Interior/>
      </Style>
      <Style ss:ID=\"s101\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Bottom\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"s102\">
       <Alignment ss:Horizontal=\"Left\" ss:Vertical=\"Bottom\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"s107\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Bottom\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font ss:FontName=\"Calibri\" x:Family=\"Swiss\" ss:Size=\"11\" ss:Color=\"#000000\"
        ss:Bold=\"1\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"s109\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\" ss:WrapText=\"1\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font ss:FontName=\"Calibri\" x:Family=\"Swiss\" ss:Size=\"11\" ss:Color=\"#000000\"
        ss:Bold=\"1\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"s110\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font ss:FontName=\"Calibri\" x:Family=\"Swiss\" ss:Size=\"11\" ss:Color=\"#000000\"
        ss:Bold=\"1\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"s114\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font ss:FontName=\"Calibri\" x:Family=\"Swiss\" ss:Size=\"9\" ss:Color=\"#000000\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"s115\">
       <Alignment ss:Horizontal=\"Center\" ss:Vertical=\"Center\"/>
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font ss:FontName=\"Calibri\" x:Family=\"Swiss\" ss:Size=\"9\" ss:Color=\"#000000\"/>
       <Interior/>
      </Style>
      <Style ss:ID=\"s116\">
       <Borders>
        <Border ss:Position=\"Bottom\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Left\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Right\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
        <Border ss:Position=\"Top\" ss:LineStyle=\"Continuous\" ss:Weight=\"1\"/>
       </Borders>
       <Font x:Family=\"Swiss\" ss:Size=\"11\"/>
       <Interior/>
      </Style>
     </Styles>
     <Worksheet ss:Name=\"Sheet1\">
      <Table ss:ExpandedColumnCount=\"51\" ss:ExpandedRowCount=\"10000\" x:FullColumns=\"1\"
       x:FullRows=\"1\" ss:StyleID=\"s100\" ss:DefaultColumnWidth=\"25\"
       ss:DefaultRowHeight=\"16\">
       <Column ss:Index=\"2\" ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"194\"/>
       <Column ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"131\"/>
       <Column ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"130\"/>
       <Column ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"131\"/>
       <Column ss:Index=\"22\" ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"60\"/>
       <Column ss:Index=\"24\" ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"60\"/>
       <Column ss:Index=\"26\" ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"45\"/>
       <Column ss:Index=\"28\" ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"45\"/>
       <Column ss:Index=\"30\" ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"85\"/>
       <Column ss:Index=\"32\" ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"50\"/>
       <Column ss:Index=\"36\" ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"60\"/>
       <Column ss:Index=\"38\" ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"60\"/>
       <Column ss:Index=\"40\" ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"60\"/>
       <Row>
        <Cell><Data ss:Type=\"String\">DAFTAR PENGURANGAN REMUNERASI PEGAWAI PER BULAN - POLTEKKES KEMENKES SEMARANG</Data></Cell>
        <Cell ss:Index=\"3\" ss:StyleID=\"s101\"/>
       </Row>
       <Row>
        <Cell ss:Index=\"3\" ss:StyleID=\"s101\"/>
        <Cell ss:Index=\"22\"><Data ss:Type=\"String\"> </Data></Cell>
       </Row>
       <Row>
        <Cell><Data ss:Type=\"String\">BULAN</Data></Cell>
        <Cell ss:Index=\"3\" ss:StyleID=\"s102\"><Data ss:Type=\"String\">: ".strtoupper($namabulan)."</Data></Cell>
       </Row>
       <Row>
        <Cell><Data ss:Type=\"String\">UNIT KERJA</Data></Cell>
        <Cell ss:Index=\"3\" ss:StyleID=\"s102\"><Data ss:Type=\"String\">: ".strtoupper($unitkerja)."</Data></Cell>
       </Row>
       <Row>
        <Cell ss:Index=\"29\"><Data ss:Type=\"String\">konversi dari 7.5 jam ke 1 hari</Data></Cell>
        <Cell ss:Index=\"35\"><Data ss:Type=\"String\">hari kerja = senin - jumat (dipotong hari libur)</Data></Cell>
       </Row>
       <Row ss:Height=\"30\">
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"s65\"><Data ss:Type=\"String\">No</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"s65\"><Data ss:Type=\"String\">Nama</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"s65\"><Data ss:Type=\"String\">PANGKAT/GOL.</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"s65\"><Data ss:Type=\"String\">NIP</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"s65\"><Data ss:Type=\"String\">Jabatan</Data></Cell>
        <Cell ss:MergeAcross=\"7\" ss:StyleID=\"s65\"><Data ss:Type=\"String\">Tingkat Keterlambatan (Menit)</Data></Cell>

        <Cell ss:MergeAcross=\"7\" ss:StyleID=\"s65\"><Data ss:Type=\"String\">Tingkat Pulang Sebelum Waktunya (Menit)</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5879132\"><Data ss:Type=\"String\">Tidak melakukan rekam kehadiran (masuk kerja)</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5879152\"><Data ss:Type=\"String\">% POT</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5879172\"><Data ss:Type=\"String\">Tidak melakukan rekam kehadiran (pulang kerja)</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5859104\"><Data ss:Type=\"String\">% POT</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"s65\"><Data ss:Type=\"String\">Tidak hadir tanpa kete- rangan (hari)</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5879072\"><Data ss:Type=\"String\">% POT</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5879092\"><Data ss:Type=\"String\">Tidak Ditempat Tugas (hari)</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5879112\"><Data ss:Type=\"String\">% POT</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5859124\"><Data ss:Type=\"String\">Cuti (tahunan akumulasi, melahirkan, sakit, alasan penting, di luar tanggungan negara)</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5859144\"><Data ss:Type=\"String\">% POT</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5859124\"><Data ss:Type=\"String\">Tidak Upacara (HUT RI / HKN)</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5859144\"><Data ss:Type=\"String\">% POT</Data></Cell>
        <Cell ss:MergeAcross=\"5\" ss:StyleID=\"s107\"><Data ss:Type=\"String\">INDEKS KINERJA DOSEN</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"s65\"><Data ss:Type=\"String\">TOTAL % POTONGAN</Data></Cell>
       </Row>
       <Row ss:Height=\"50\">
        <Cell ss:Index=\"6\" ss:StyleID=\"s68\"><Data ss:Type=\"String\">1  s.d 30</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">% POT</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">31 s.d 60</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">% POT</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">61 s.d 90</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">% POT</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">&gt; 90</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">% POT</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">1  s.d 30</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">% POT</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">31 s.d 60</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">% POT</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">61 s.d 90</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">% POT</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">&gt; 90</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">% POT</Data></Cell>
        <Cell ss:Index=\"34\" ss:StyleID=\"s109\"><Data ss:Type=\"String\">RPS</Data></Cell>
        <Cell ss:StyleID=\"s109\"><Data ss:Type=\"String\"> % POT</Data></Cell>
        <Cell ss:StyleID=\"s109\"><Data ss:Type=\"String\">Penyerahan Nilai</Data></Cell>
        <Cell ss:StyleID=\"s109\"><Data ss:Type=\"String\"> % POT</Data></Cell>
        <Cell ss:StyleID=\"s110\"><Data ss:Type=\"String\">Kehadiran</Data></Cell>
        <Cell ss:StyleID=\"s109\"><Data ss:Type=\"String\"> % POT</Data></Cell>
       </Row>

       <Row>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(3)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(4)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(5)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(6)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(7)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(8)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(9)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(10)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(11)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(12)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(13)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(14)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(15)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(16)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(17)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(18)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(19)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(20)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(21)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(22)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(23)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(24)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(25)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(26)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(27)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(28)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(29)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(30)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(31)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(32)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(33)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(34)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(35)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(36)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(37)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(38)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(39)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(40)</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">(41)</Data></Cell>
       </Row>";


$pegawai = \PegawaiModel::orderBy('id_unit','asc')
->leftJoin('mst_golongan','mst_golongan.id','=','mst_pegawai.id_golongan')
->leftJoin('mst_unit','mst_unit.id','=','mst_pegawai.id_unit')
->select('mst_pegawai.*','mst_unit.nama as unit','mst_golongan.golongan','mst_golongan.pangkat');

if($id_unit>0) {
$pegawai = $pegawai->where('id_unit','=',$id_unit);
}

$pegawai = $pegawai
       ->orderBy('id_unit','asc')
       ->orderBy('pin','asc')
       ->get();
$no = 1;

foreach ($pegawai as $peg) {
    $golongan = $peg->pangkat.', '.$peg->golongan;

    if($peg->is_shift){
        // hitungan jika shift
        $ijin_lain = 0;
        $tanpa_keterangan = 0;
        $tidak_rekam_datang = 0;
        $tidak_rekam_pulang = 0;
        $terlambat1 = $terlambat2 = $terlambat3 = $terlambat4 = 0;
        $pulangcepat1 = $pulangcepat2 = $pulangcepat3 = $pulangcepat4 = 0;

        $jml_hari = date('t',strtotime($tahun.'-'.$bulan.'-01'));

        for($i=1; $i<=$jml_hari; $i++):
            $tanggal = $tahun.'-'.sprintf("%02d", $bulan).'-'.sprintf("%02d", $i);
            $cek_ijin = \DB::table('tr_ijin')
                ->leftJoin('mst_ijin','mst_ijin.id','=','tr_ijin.jns_ijin')
                ->select('tr_ijin.*','mst_ijin.nama as ijin','mst_ijin.singkatan')
                ->where('nip','=',$peg->nip)
                ->whereDate('tanggal_mulai','<=',$tanggal)
                ->whereDate('tanggal_selesai','>=',$tanggal)
                ->first();

            if($cek_ijin){
                if($cek_ijin->singkatan=='I') {
                    //$ijin++;
                }elseif($cek_ijin->singkatan=='DL') {
                    //$dinas_luar++;
                }elseif($cek_ijin->singkatan=='C') {
                    $ijin_lain++;
                }elseif($cek_ijin->singkatan=='S') {
                    //$sakit++;
                }
            }else{
                $shift = \JadwalshiftModel::
                    leftJoin('mst_shift','mst_shift.id','=','tr_jadwal_shift.id_shift')
                    ->select('mst_shift.*')
                    ->where('nip','=',$peg->nip)
                    ->where('tanggal','=',$tanggal)
                    ->get();

                $arr_absen = array();
                $arr_shift = array();

                $arr_kurang_datang = array();
                $arr_kurang_pulang = array();

                $temp_jam_pulang = '';

                $shift_ke = 0;
                $index_ke = 0;

                if(count($shift)==0) {
                    // ...
                } else {
                    foreach ($shift as $s) {
                        $jns_shift = $s->singkatan;
                        $batas_datang = intval(substr($s->jam_datang,0,2))-2;
                        $batas_pulang = intval(substr($s->jam_pulang,0,2))+2;

                        //jika ada 2/lebih yang nyambung jam nya maka disela2 jam tidak perlu absen
                        if($temp_jam_pulang==$s->jam_datang) {
                            $arr_kurang_datang[$shift_ke] = 0;
                            $arr_kurang_pulang[$shift_ke-1] = 0;       
                            $arr_absen[$index_ke-1] = '====='; 
                            array_push($arr_absen, '=====');
                            array_push($arr_shift, $jns_shift);                                   
                        } else {
                            //ambil absen datang untuk shift tsb itu
                            $datang = \DB::table('tr_shift_absen')
                                        ->where('nip','=',$peg->nip)
                                        ->where('tanggal','=',$tanggal)
                                        ->where(\DB::Raw('CAST(substring(jam,1,2) AS UNSIGNED)'),'>=',$batas_datang)
                                        ->orderBy('jam','asc')
                                        ->first();

                            //array push utk menyimpan ke dalam array dan dicetak setelah loopuing shift
                            if($datang) {                
                                array_push($arr_absen, $datang->jam);
                            } else {
                                array_push($arr_absen, '-');
                            }
                            array_push($arr_shift, $jns_shift);   
                        }

                        //jika shift malam makanya pulangnya ambil di tanggal berikutnya
                        $tanggal_berikutnya = date('Y-m-d',strtotime($tanggal. "+1 days"));
                        if($jns_shift=='M') {                                        
                            //ambil absen pulang untuk shift tsb itu
                            $pulang = \DB::table('tr_shift_absen')
                                        ->where('nip','=',$peg->nip)
                                        ->where('tanggal','=',$tanggal_berikutnya)
                                        ->where(\DB::Raw('CAST(substring(jam,1,2) AS UNSIGNED)'),'<=',$batas_pulang)
                                        ->orderBy('jam','desc')
                                        ->first();
                        } else {          
                            //ambil absen pulang untuk shift tsb itu
                            $pulang = \DB::table('tr_shift_absen')
                                        ->where('nip','=',$peg->nip)
                                        ->where('tanggal','=',$tanggal)
                                        ->where(\DB::Raw('CAST(substring(jam,1,2) AS UNSIGNED)'),'<=',$batas_pulang)
                                        ->orderBy('jam','desc')
                                        ->first();
                        }
                        

                        //array push utk menyimpan ke dalam array dan dicetak setelah loopuing shift
                        if($pulang && !in_array($pulang->jam, $arr_absen)) {
                            array_push($arr_absen, $pulang->jam);
                        } else {
                            array_push($arr_absen, '-');
                        }
                        array_push($arr_shift, $jns_shift);

                        $jam_kerja_datang = strtotime($s->jam_datang);
                        $jam_kerja_pulang = strtotime($s->jam_pulang);

                        if($datang && $pulang) {
                            //mengecek jika ada terlambat atau pulang cepat
                            $str_jam_datang = strtotime($datang->jam);
                            $str_jam_pulang = strtotime($pulang->jam);
                            if($temp_jam_pulang!=$s->jam_datang) {
                                $arr_kurang_datang[$shift_ke] = ($str_jam_datang - $jam_kerja_datang)/60<0?0:($str_jam_datang-$jam_kerja_datang)/60;
                            }
                            $arr_kurang_pulang[$shift_ke] = ($str_jam_pulang - $jam_kerja_pulang)/60>0?0:($jam_kerja_pulang-$str_jam_pulang)/60;
                        } elseif($jns_shift=='M') { 
                            if($temp_jam_pulang!=$s->jam_datang) {
                                $arr_kurang_datang[$shift_ke] = 
                                    round(abs(strtotime(date('H:i:s',strtotime('23:59:00'))) - $jam_kerja_datang)/60,2)
                                        + round(abs($jam_kerja_pulang - strtotime(date('H:i:s',strtotime('00:00:00'))))/60,2)
                                        + 1;
                            }
                        } else {
                            if($temp_jam_pulang!=$s->jam_datang) {
                                $arr_kurang_datang[$shift_ke] = round(abs($jam_kerja_pulang - $jam_kerja_datang)/60,2);
                            }
                        }
                        $index_ke++;
                        $shift_ke++;
                        $temp_jam_pulang = $s->jam_pulang;
                    
                        if(count($arr_absen)==2 && $datang && $pulang) {
                            //mengecek jika ada terlambat atau pulang cepat
                            $jam_kerja_datang = strtotime($s->jam_datang);
                            $jam_kerja_pulang = strtotime($s->jam_pulang);
                            $str_jam_datang = strtotime($datang->jam);
                            $str_jam_pulang = strtotime($pulang->jam);
                            if($temp_jam_pulang!=$s->jam_datang) {
                                $arr_kurang_datang[$shift_ke] = ($str_jam_datang - $jam_kerja_datang)/60<0?0:($str_jam_datang-$jam_kerja_datang)/60;
                            }
                            $arr_kurang_pulang[$shift_ke] = ($str_jam_pulang - $jam_kerja_pulang)/60>0?0:($jam_kerja_pulang-$str_jam_pulang)/60;
                        }
                        $index_ke++;
                        $shift_ke++;
                        $temp_jam_pulang = $s->jam_pulang;
                    }
                    if(in_array('-',$arr_absen)) {
                        // bila ada rekam absensi yg kosong
                        $tdk_rkm_datang = 0; $tdk_rkm_pulang = 0;
                        foreach($arr_absen as $key => $arr){
                            if( $key%2==0 ){
                                if($arr=='-') $tdk_rkm_datang = 1;
                            }
                            else{
                                if($arr=='-') $tdk_rkm_pulang = 1;
                            }

                            // setelah mendapat nilai jam datang dan pulang per shift
                            if( $key%2 ){
                                if( $tdk_rkm_datang && $tdk_rkm_pulang ){
                                    $tanpa_keterangan++;
                                }else{
                                    if($tdk_rkm_datang) $tidak_rekam_datang++;
                                    if($tdk_rkm_pulang) $tidak_rekam_pulang++;
                                }
                                $tdk_rkm_datang = 0; $tdk_rkm_pulang = 0;
                            }
                        }
                    } elseif (array_sum($arr_kurang_datang)>0 || array_sum($arr_kurang_pulang)>0) {
                        // bila ada kekurangan jam kehadiran
                        $sum_kurang_datang = array_sum($arr_kurang_datang);
                        $sum_kurang_pulang = array_sum($arr_kurang_pulang);

                        if( $sum_kurang_datang<31 )
                            $terlambat1++;
                        elseif( $sum_kurang_datang>30 || $sum_kurang_datang<61 )
                            $terlambat2++;
                        elseif( $sum_kurang_datang>60 || $sum_kurang_datang<91 )
                            $terlambat3++;
                        elseif( $sum_kurang_datang>90 )
                            $terlambat4++;

                        if( $sum_kurang_pulang<31 )
                            $pulangcepat1++;
                        elseif( $sum_kurang_pulang>30 || $sum_kurang_pulang<61 )
                            $pulangcepat2++;
                        elseif( $sum_kurang_pulang>60 || $sum_kurang_pulang<91 )
                            $pulangcepat3++;
                        elseif( $sum_kurang_pulang>90 )
                            $pulangcepat4++;
                    }
                }
            }
        endfor;

        if( empty($terlambat1) ) $terlambat1 = '-';
        if( empty($terlambat2) ) $terlambat2 = '-';
        if( empty($terlambat3) ) $terlambat3 = '-';
        if( empty($terlambat4) ) $terlambat4 = '-';

        if( empty($pulangcepat1) ) $pulangcepat1 = '-';
        if( empty($pulangcepat2) ) $pulangcepat2 = '-';
        if( empty($pulangcepat3) ) $pulangcepat3 = '-';
        if( empty($pulangcepat4) ) $pulangcepat4 = '-';

        if( empty($tidak_rekam_datang) ) $tidak_rekam_datang = '-';
        if( empty($tidak_rekam_pulang) ) $tidak_rekam_pulang = '-';
        if( empty($tanpa_keterangan) ) $tanpa_keterangan = '-';
        if( empty($ijin_lain) ) $ijin_lain = '-';
    }else{
        //hitungan jika jam kerja biasa
        $terlambat1 = \RekapabsensiModel::
               where('nip','=',$peg->nip)
               ->where(DB::RAW('YEAR(tanggal)'),'=',$tahun)
               ->where(DB::RAW('MONTH(tanggal)'),'=',$bulan)
               ->where('kurang_datang','>',0)
               ->where('kurang_datang','<',31)
               ->where('jam_datang','!=','00:00:00')
               ->where('jam_pulang','!=','00:00:00')
               ->where('id_ijin','=',0)
               ->where('is_libur','=',0)
               ->get();

        $terlambat2 = \RekapabsensiModel::
               where('nip','=',$peg->nip)
               ->where(DB::RAW('YEAR(tanggal)'),'=',$tahun)
               ->where(DB::RAW('MONTH(tanggal)'),'=',$bulan)
               ->where('kurang_datang','>',30)
               ->where('kurang_datang','<',61)
               ->where('jam_datang','!=','00:00:00')
               ->where('jam_pulang','!=','00:00:00')
               ->where('id_ijin','=',0)
               ->where('is_libur','=',0)
               ->get();

        $terlambat3 = \RekapabsensiModel::
               where('nip','=',$peg->nip)
               ->where(DB::RAW('YEAR(tanggal)'),'=',$tahun)
               ->where(DB::RAW('MONTH(tanggal)'),'=',$bulan)
               ->where('kurang_datang','>',60)
               ->where('kurang_datang','<',91)
               ->where('jam_datang','!=','00:00:00')
               ->where('jam_pulang','!=','00:00:00')
               ->where('id_ijin','=',0)
               ->where('is_libur','=',0)
               ->get();

        $terlambat4 = \RekapabsensiModel::
               where('nip','=',$peg->nip)
               ->where(DB::RAW('YEAR(tanggal)'),'=',$tahun)
               ->where(DB::RAW('MONTH(tanggal)'),'=',$bulan)
               ->where('kurang_datang','>',90)
               ->where('jam_datang','!=','00:00:00')
               ->where('jam_pulang','!=','00:00:00')
               ->where('id_ijin','=',0)
               ->where('is_libur','=',0)
               ->get();

        $pulangcepat1 = \RekapabsensiModel::
               where('nip','=',$peg->nip)
               ->where(DB::RAW('YEAR(tanggal)'),'=',$tahun)
               ->where(DB::RAW('MONTH(tanggal)'),'=',$bulan)
               ->where('kurang_pulang','>',0)
               ->where('kurang_pulang','<',31)
               ->where('jam_datang','!=','00:00:00')
               ->where('jam_pulang','!=','00:00:00')
               ->where('id_ijin','=',0)
               ->where('is_libur','=',0)
               ->get();

        $pulangcepat2 = \RekapabsensiModel::
               where('nip','=',$peg->nip)
               ->where(DB::RAW('YEAR(tanggal)'),'=',$tahun)
               ->where(DB::RAW('MONTH(tanggal)'),'=',$bulan)
               ->where('kurang_pulang','>',30)
               ->where('kurang_pulang','<',61)
               ->where('jam_datang','!=','00:00:00')
               ->where('jam_pulang','!=','00:00:00')
               ->where('id_ijin','=',0)
               ->where('is_libur','=',0)
               ->get();

        $pulangcepat3 = \RekapabsensiModel::
               where('nip','=',$peg->nip)
               ->where(DB::RAW('YEAR(tanggal)'),'=',$tahun)
               ->where(DB::RAW('MONTH(tanggal)'),'=',$bulan)
               ->where('kurang_pulang','>',60)
               ->where('kurang_pulang','<',91)
               ->where('jam_datang','!=','00:00:00')
               ->where('jam_pulang','!=','00:00:00')
               ->where('id_ijin','=',0)
               ->where('is_libur','=',0)
               ->get();

        $pulangcepat4 = \RekapabsensiModel::
               where('nip','=',$peg->nip)
               ->where(DB::RAW('YEAR(tanggal)'),'=',$tahun)
               ->where(DB::RAW('MONTH(tanggal)'),'=',$bulan)
               ->where('kurang_pulang','>',90)
               ->where('jam_datang','!=','00:00:00')
               ->where('jam_pulang','!=','00:00:00')
               ->where('id_ijin','=',0)
               ->where('is_libur','=',0)
               ->get();

        $tanpa_keterangan = \RekapabsensiModel::
               where('nip','=',$peg->nip)
               ->where(DB::RAW('YEAR(tanggal)'),'=',$tahun)
               ->where(DB::RAW('MONTH(tanggal)'),'=',$bulan)
               ->where('jam_datang','00:00:00')
               ->where('jam_pulang','00:00:00')
               ->where('id_ijin','=',0)
               ->where('is_libur','=',0)
               ->get();

        $tidak_rekam_datang = \RekapabsensiModel::
               where('nip','=',$peg->nip)
               ->where(DB::RAW('YEAR(tanggal)'),'=',$tahun)
               ->where(DB::RAW('MONTH(tanggal)'),'=',$bulan)
               ->where('jam_datang','00:00:00')
               ->where('jam_pulang','!=','00:00:00')
               ->where('id_ijin','=',0)
               ->where('is_libur','=',0)
               ->get();

        $tidak_rekam_pulang = \RekapabsensiModel::
               where('nip','=',$peg->nip)
               ->where(DB::RAW('YEAR(tanggal)'),'=',$tahun)
               ->where(DB::RAW('MONTH(tanggal)'),'=',$bulan)
               ->where('jam_datang','!=','00:00:00')
               ->where('jam_pulang','00:00:00')
               ->where('id_ijin','=',0)
               ->where('is_libur','=',0)
               ->get();

        // $bertugas_diluar = \RekapabsensiModel::
        //                select('tr_rekap_absensi.*')
        //                ->join('tr_ijin', 'tr_ijin.id', '=', 'tr_rekap_absensi.id_ijin')
        //                ->where('tr_rekap_absensi.nip','=',$peg->nip)
        //                ->where(DB::RAW('YEAR(tr_rekap_absensi.tanggal)'),'=',$tahun)
        //                ->where(DB::RAW('MONTH(tr_rekap_absensi.tanggal)'),'=',$bulan)
        //                ->where('tr_ijin.jns_ijin','=',3)
        //                ->where('is_libur','=',0)
        //                ->get();

        // cuti
        $ijin_lain = \RekapabsensiModel::
               select('tr_rekap_absensi.*')
               ->join('tr_ijin', 'tr_ijin.id', '=', 'tr_rekap_absensi.id_ijin')
               ->where('tr_rekap_absensi.nip','=',$peg->nip)
               ->where(DB::RAW('YEAR(tr_rekap_absensi.tanggal)'),'=',$tahun)
               ->where(DB::RAW('MONTH(tr_rekap_absensi.tanggal)'),'=',$bulan)
               ->where('tr_ijin.jns_ijin','=',5)
               ->where('is_libur','=',0)
            //    ->whereIn('tr_ijin.jns_ijin',[1,5,9])
               ->get();

        $terlambat1 = count($terlambat1)==0?"-":count($terlambat1);
        $terlambat2 = count($terlambat2)==0?"-":count($terlambat2);
        $terlambat3 = count($terlambat3)==0?"-":count($terlambat3);
        $terlambat4 = count($terlambat4)==0?"-":count($terlambat4);

        $pulangcepat1 = count($pulangcepat1)==0?"-":count($pulangcepat1);
        $pulangcepat2 = count($pulangcepat2)==0?"-":count($pulangcepat2);
        $pulangcepat3 = count($pulangcepat3)==0?"-":count($pulangcepat3);
        $pulangcepat4 = count($pulangcepat4)==0?"-":count($pulangcepat4);

        $tidak_rekam_datang = count($tidak_rekam_datang)==0?"-":count($tidak_rekam_datang);
        $tidak_rekam_pulang = count($tidak_rekam_pulang)==0?"-":count($tidak_rekam_pulang);
        $tanpa_keterangan = count($tanpa_keterangan)==0?"-":count($tanpa_keterangan);
        $ijin_lain = count($ijin_lain)==0?"-":count($ijin_lain);
    }

$persen_terlambat1 = $terlambat1!="-"?$terlambat1*0.5:"-";
$persen_terlambat2 = $terlambat2!="-"?$terlambat2*1:"-";
$persen_terlambat3 = $terlambat3!="-"?$terlambat3*1.25:"-";
$persen_terlambat4 = $terlambat4!="-"?$terlambat4*1.5:"-";

$persen_pulangcepat1 = $pulangcepat1!="-"?$pulangcepat1*0.5:"-";
$persen_pulangcepat2 = $pulangcepat2!="-"?$pulangcepat2*1:"-";
$persen_pulangcepat3 = $pulangcepat3!="-"?$pulangcepat3*1.25:"-";
$persen_pulangcepat4 = $pulangcepat4!="-"?$pulangcepat4*1.5:"-";

$persen_tidak_rekam_datang = $tidak_rekam_datang!="-"?$tidak_rekam_datang*1.5:"-";
$persen_tidak_rekam_pulang = $tidak_rekam_pulang!="-"?$tidak_rekam_pulang*1.5:"-";
$persen_tanpa_keterangan = $tanpa_keterangan!="-"?$tanpa_keterangan*3:"-";
$persen_ijin_lain = $ijin_lain!="-"?$ijin_lain*3:"-";

$cetak .= "<Row>
<Cell ss:StyleID=\"s88\"><Data ss:Type=\"Number\">".$no++."</Data></Cell>
<Cell ss:StyleID=\"s116\"><Data ss:Type=\"String\">".$peg->nama."</Data></Cell>
<Cell ss:StyleID=\"s116\"><Data ss:Type=\"String\">".$golongan."</Data></Cell>
<Cell ss:StyleID=\"s116\"><Data ss:Type=\"String\">".$peg->nip."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\"></Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$terlambat1."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$persen_terlambat1."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$terlambat2."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$persen_terlambat2."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$terlambat3."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$persen_terlambat3."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$terlambat4."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$persen_terlambat4."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$pulangcepat1."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$persen_pulangcepat1."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$pulangcepat2."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$persen_pulangcepat2."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$pulangcepat3."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$persen_pulangcepat3."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$pulangcepat4."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$persen_pulangcepat4."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$tidak_rekam_datang."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$persen_tidak_rekam_datang."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$tidak_rekam_pulang."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$persen_tidak_rekam_pulang."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$tanpa_keterangan."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$persen_tanpa_keterangan."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\"></Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\"></Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$ijin_lain."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\">".$persen_ijin_lain."</Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\"></Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\"></Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\"></Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\"></Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\"></Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\"></Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\"></Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\"></Data></Cell>
 <Cell ss:StyleID=\"s88\"><Data ss:Type=\"String\"></Data></Cell>
</Row>";

}

$cetak .= "
      </Table>
      <WorksheetOptions xmlns=\"urn:schemas-microsoft-com:office:excel\">
       <PageSetup>
        <Header x:Margin=\"0.3\"/>
        <Footer x:Margin=\"0.3\"/>
        <PageMargins x:Bottom=\"0.75\" x:Left=\"0.7\" x:Right=\"0.7\" x:Top=\"0.75\"/>
       </PageSetup>
       <Print>
       </Print>
       <PageLayoutZoom>0</PageLayoutZoom>
       <Selected/>
       <LeftColumnVisible>3</LeftColumnVisible>
       <Panes>
        <Pane>
         <Number>3</Number>
         <ActiveRow>17</ActiveRow>
         <ActiveCol>35</ActiveCol>
        </Pane>
       </Panes>
       <ProtectObjects>False</ProtectObjects>
       <ProtectScenarios>False</ProtectScenarios>
      </WorksheetOptions>
     </Worksheet>
    </Workbook>";

force_download('Rekap Potongan Remunerasi - '.getBulan($bulan).' '.$tahun.'.xls',$cetak)
?>
