<?php

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
       x:FullRows=\"1\" ss:StyleID=\"s100\" ss:DefaultColumnWidth=\"65\"
       ss:DefaultRowHeight=\"16\">
       <Column ss:Index=\"2\" ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"194\"/>
       <Column ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"131\"/>
       <Column ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"130\" ss:Span=\"1\"/>
       <Column ss:Index=\"6\" ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"129\"/>
       <Column ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"131\"/>
       <Column ss:Index=\"10\" ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"15\"/>
       <Column ss:Index=\"27\" ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"63\"/>
       <Column ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"71\"/>
       <Column ss:Index=\"31\" ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"88\"/>
       <Column ss:Index=\"33\" ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"89\"/>
       <Column ss:Index=\"38\" ss:StyleID=\"s100\" ss:AutoFitWidth=\"0\" ss:Width=\"80\"/>
       <Row>
        <Cell><Data ss:Type=\"String\">CONTOH FORMAT PENGURANGAN REMUNERASI PEGAWAI POLTEKKES KEMENKES SEMARANG</Data></Cell>
        <Cell ss:Index=\"3\" ss:StyleID=\"s101\"/>
       </Row>
       <Row>
        <Cell ss:Index=\"3\" ss:StyleID=\"s101\"/>
        <Cell ss:Index=\"22\"><Data ss:Type=\"String\"> </Data></Cell>
       </Row>
       <Row>
        <Cell><Data ss:Type=\"String\">BULAN</Data></Cell>
        <Cell ss:Index=\"3\" ss:StyleID=\"s102\"><Data ss:Type=\"String\">:</Data></Cell>
       </Row>
       <Row>
        <Cell><Data ss:Type=\"String\">UNIT KERJA</Data></Cell>
        <Cell ss:Index=\"3\" ss:StyleID=\"s102\"><Data ss:Type=\"String\">:</Data></Cell>
       </Row>
       <Row>
        <Cell ss:Index=\"29\"><Data ss:Type=\"String\">konversi dari 7.5 jam ke 1 hari</Data></Cell>
        <Cell ss:Index=\"35\"><Data ss:Type=\"String\">hari kerja = senin - jumat (dipotong hari libur)</Data></Cell>
        <Cell ss:Index=\"39\"><Data ss:Type=\"String\">P2 = insentif remun</Data></Cell>
       </Row>
       <Row ss:AutoFitHeight=\"0\">
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"s65\"><Data ss:Type=\"String\">No</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"s65\"><Data ss:Type=\"String\">Nama</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"s114\"><Data ss:Type=\"String\">PANGKAT/GOL.</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"s114\"><Data ss:Type=\"String\">NIP</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"s114\"><Data ss:Type=\"String\">NPWP</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"s65\"><Data ss:Type=\"String\">Staus Pegawai (PNS/NON PNS)</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"s65\"><Data ss:Type=\"String\">Jabatan</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"s65\"><Data ss:Type=\"String\">Grade</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"s65\"><Data ss:Type=\"String\">Nilai Remunerasi</Data></Cell>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:MergeAcross=\"6\" ss:StyleID=\"s65\"><Data ss:Type=\"String\">Tingkat Keterlambatan (Menit)</Data></Cell>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:MergeAcross=\"5\" ss:StyleID=\"s65\"><Data ss:Type=\"String\">Tingkat Pulang Sebelum Waktunya (Menit)</Data></Cell>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s69\"/>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"s65\"><Data ss:Type=\"String\">Tidak Hadir (hari)</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5879072\"><Data ss:Type=\"String\">% POTONGAN</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5879092\"><Data ss:Type=\"String\">Tidak Ditempat Tugas (hari)</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5879112\"><Data ss:Type=\"String\">% POTONGAN</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5879132\"><Data ss:Type=\"String\">Tidak melakukan rekam kehadiran (masuk kerja)</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5879152\"><Data ss:Type=\"String\">% POTONGAN</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5879172\"><Data ss:Type=\"String\">Tidak melakukan rekam kehadiran (pulang kerja)</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5859104\"><Data ss:Type=\"String\">% POTONGAN</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5859124\"><Data ss:Type=\"String\">Cuti kurang hari kerja</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5859144\"><Data ss:Type=\"String\">% POTONGAN</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5859164\"><Data ss:Type=\"String\">Cuti lebih hari kerja</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5859184\"><Data ss:Type=\"String\">% POTONGAN (tdk mendapat P2)</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5859204\"><Data ss:Type=\"String\">Cuti besar</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"m5862848\"><Data ss:Type=\"String\">% POTONGAN (tdk mendapat P2)</Data></Cell>
        <Cell ss:MergeAcross=\"3\" ss:StyleID=\"m5862908\"><Data ss:Type=\"String\">TIDAK UPACARA</Data></Cell>
        <Cell ss:MergeAcross=\"5\" ss:StyleID=\"s107\"><Data ss:Type=\"String\">INDEKS KINERJA DOSEN</Data></Cell>
        <Cell ss:MergeDown=\"1\" ss:StyleID=\"s65\"><Data ss:Type=\"String\">TOTAL % POTONGAN</Data></Cell>
       </Row>
       <Row ss:Height=\"30\">
        <Cell ss:Index=\"10\" ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">1 s.d 30</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">% POTONGAN</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">31 s.d 60</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">% POTONGAN</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">61 s.d 90</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">% POTONGAN</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">&gt; 90</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">% POTONGAN</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">1 s.d 30</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">% POTONGAN</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">31 s.d 60</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">% POTONGAN</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">61 s.d 90</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">% POTONGAN</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">&gt; 90</Data></Cell>
        <Cell ss:StyleID=\"s68\"><Data ss:Type=\"String\">% POTONGAN</Data></Cell>
        <Cell ss:Index=\"41\" ss:StyleID=\"s109\"><Data ss:Type=\"String\">HUT RI</Data></Cell>
        <Cell ss:StyleID=\"s109\"><Data ss:Type=\"String\">% POTONGAN</Data></Cell>
        <Cell ss:StyleID=\"s109\"><Data ss:Type=\"String\">HKN</Data></Cell>
        <Cell ss:StyleID=\"s109\"><Data ss:Type=\"String\"> % POTONGAN</Data></Cell>
        <Cell ss:StyleID=\"s110\"><Data ss:Type=\"String\">RPP</Data></Cell>
        <Cell ss:StyleID=\"s109\"><Data ss:Type=\"String\"> % POTONGAN</Data></Cell>
        <Cell ss:StyleID=\"s109\"><Data ss:Type=\"String\">PENYERAHAN NILAI</Data></Cell>
        <Cell ss:StyleID=\"s109\"><Data ss:Type=\"String\"> % POTONGAN</Data></Cell>
        <Cell ss:StyleID=\"s110\"><Data ss:Type=\"String\">KEHADIRAN</Data></Cell>
        <Cell ss:StyleID=\"s109\"><Data ss:Type=\"String\"> % POTONGAN</Data></Cell>
       </Row>

       <Row>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s115\"/>
        <Cell ss:StyleID=\"s115\"/>
        <Cell ss:StyleID=\"s115\"/>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s68\"/>
        <Cell ss:StyleID=\"s87\"/>
        <Cell ss:StyleID=\"s86\"/>
        <Cell ss:StyleID=\"s86\"/>
        <Cell ss:StyleID=\"s86\"/>
        <Cell ss:StyleID=\"s86\"/>
        <Cell ss:StyleID=\"s86\"/>
        <Cell ss:StyleID=\"s86\"/>
        <Cell ss:StyleID=\"s86\"/>
        <Cell ss:StyleID=\"s86\"/>
        <Cell ss:StyleID=\"s86\"/>
        <Cell ss:StyleID=\"s86\"/>
        <Cell ss:StyleID=\"s86\"/>
        <Cell ss:StyleID=\"s86\"/>
        <Cell ss:StyleID=\"s109\"/>
        <Cell ss:StyleID=\"s109\"/>
        <Cell ss:StyleID=\"s109\"/>
        <Cell ss:StyleID=\"s109\"/>
        <Cell ss:StyleID=\"s110\"/>
        <Cell ss:StyleID=\"s109\"/>
        <Cell ss:StyleID=\"s109\"/>
        <Cell ss:StyleID=\"s109\"/>
        <Cell ss:StyleID=\"s110\"/>
        <Cell ss:StyleID=\"s109\"/>
        <Cell ss:StyleID=\"s68\"/>
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

    $terlambat1 = count($terlambat1)==0?"-":count($terlambat1);
    $terlambat2 = count($terlambat2)==0?"-":count($terlambat2);
    $terlambat3 = count($terlambat3)==0?"-":count($terlambat3);
    $terlambat4 = count($terlambat4)==0?"-":count($terlambat4);

    $persen_terlambat1 = $terlambat1!="-"?$terlambat1*0.5:"-";
    $persen_terlambat2 = $terlambat2!="-"?$terlambat2*1:"-";
    $persen_terlambat3 = $terlambat3!="-"?$terlambat3*1.25:"-";
    $persen_terlambat4 = $terlambat4!="-"?$terlambat4*1.5:"-";

    $pulangcepat1 = count($pulangcepat1)==0?"-":count($pulangcepat1);
    $pulangcepat2 = count($pulangcepat2)==0?"-":count($pulangcepat2);
    $pulangcepat3 = count($pulangcepat3)==0?"-":count($pulangcepat3);
    $pulangcepat4 = count($pulangcepat4)==0?"-":count($pulangcepat4);

    $persen_pulangcepat1 = $pulangcepat1!="-"?$pulangcepat1*0.5:"-";
    $persen_pulangcepat2 = $pulangcepat2!="-"?$pulangcepat2*1:"-";
    $persen_pulangcepat3 = $pulangcepat3!="-"?$pulangcepat3*1.25:"-";
    $persen_pulangcepat4 = $pulangcepat4!="-"?$pulangcepat4*1.5:"-";

    $golongan = $peg->pangkat.', '.$peg->golongan;

    $cetak .= "
       <Row>
        <Cell ss:StyleID=\"s88\"><Data ss:Type=\"Number\">".$no++."</Data></Cell>
        <Cell ss:StyleID=\"s116\"><Data ss:Type=\"String\">".$peg->nama."</Data></Cell>
        <Cell ss:StyleID=\"s116\"><Data ss:Type=\"String\">".$golongan."</Data></Cell>
        <Cell ss:StyleID=\"s116\"><Data ss:Type=\"String\">".$peg->nip."</Data></Cell>
        <Cell ss:StyleID=\"s116\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s116\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s116\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s116\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"Number\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"/>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\">".$terlambat1."</Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\">".$persen_terlambat1."</Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\">".$terlambat2."</Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\">".$persen_terlambat2."</Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\">".$terlambat3."</Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\">".$persen_terlambat3."</Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\">".$terlambat4."</Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\">".$persen_terlambat4."</Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\">".$pulangcepat1."</Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\">".$persen_pulangcepat1."</Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\">".$pulangcepat2."</Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\">".$persen_pulangcepat2."</Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\">".$pulangcepat3."</Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\">".$persen_pulangcepat3."</Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\">".$pulangcepat4."</Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\">".$persen_pulangcepat4."</Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
        <Cell ss:StyleID=\"s92\"><Data ss:Type=\"String\"></Data></Cell>
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
