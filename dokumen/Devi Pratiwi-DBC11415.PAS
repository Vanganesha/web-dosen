program kalkulator;
uses crt;
var a,b,c,i,e,f:integer;
    d,j:char;
    s,p,l,t,alas:integer;
    tambah,kali,bagi,pangkat,kurang:integer;
    sgitiga:real;
    prsgi,panjang:integer;
    kbs,blok:integer;
    ulang:char;
procedure sederhana;
begin
clrscr;
repeat
writeln('========kalkulator sederhana========');
writeln('      1.penjumlahan                 ');
writeln('      2.perkalian                   ');
writeln('      3.pengurangan                 ');
writeln('      4.pembagian                   ');
writeln('      5.menu sebelumnya             ');
writeln('pilih menu :'); readln(a);
case a of
1 :
 begin
 REPEAT
 clrscr;
  write('angka pertama :');readln(b);
  write('angka kedua :');readln(c);
  tambah:=b+c;
  writeln ('penjumlahan : ' ,tambah);
  writeln;
  write('anda ingin mengulang? (Y/T)');readln(d);
  until upcase(d)='T';
 end;
2 :
  begin
  repeat
  clrscr;
   write('angka pertama :');readln(b);
  write('angka kedua :');readln(c);
  kali:= b*c;
  writeln('perkalian :',kali);
  writeln;
  write('anda ingin mengulang? (Y/T)');readln(d);
  until upcase(d)='T';

  end;
3 :
  begin
  repeat
  clrscr;
    write('angka pertama :');readln(b);
  write('angka kedua :');readln(c);
  kurang:= b-c;
  writeln('pengurangan :',kurang);
  writeln;
  write('anda ingin mengulang? (Y/T)');readln(d);
  until upcase(d)='T';

  end;
4 :
  begin
  repeat
  clrscr;
  write('angka pertama :');readln(b);
  write('angka kedua :');readln(c);
  bagi:= b div c;
  writeln('pembagian :',bagi);
  writeln;
  write('anda ingin mengulang? (Y/T)');readln(d);
  until upcase(d)='T';
  end;
5 : exit
else
writeln('menu yang dimasukkan salah');
     end;
writeln ('anda ingin mengulang lagi?(Y/T) '); readln(d);
clrscr;
until (d in ['T','t']);
end;




procedure kalkulatorkedua;
        begin
        clrscr;
        repeat
        writeln('========kalkulator sederhana========');
        writeln('      1.persegi                     ');
        writeln('      2.persegi panjang             ');
        writeln('      3.segitiga                    ');
        writeln('      4.menu sebelumnya             ');
        writeln('pilih menu :'); readln(f);
        case f of
        1 :
        begin
        repeat
        clrscr;
        write('masukkan sisi :');readln(s);
        prsgi:=s*s;
        writeln ('jumlah persegi : ' ,prsgi);
        writeln;
        write('anda ingin mengulang? (Y/T)');readln(ulang);
        until upcase(ulang)='T';
        end;
        2 :
        begin
        repeat
        clrscr;
        write('masukkan panjang :');readln(p);
        write('masukkan lebar :');readln(l);
        panjang:=p*l;
        writeln ('persegi panjang : ' ,panjang);
         writeln;
         write('anda ingin mengulang? (Y/T)');readln(ulang);
         until upcase(ulang)='T';
        end;
        3 :
        begin
        repeat
        clrscr;
         write('masukkan alas :');readln(alas);
        write('masukkan tinggi :');readln(t);
        sgitiga:=(alas*t)/2;
        writeln ('segitiganya : ' ,sgitiga);
         writeln;
         write('anda ingin mengulang? (Y/T)');readln(ulang);
         until upcase(ulang)='T';
        end;
        4 : exit
        else
        writeln('menu yang anda masukkan salah');
         end;
         writeln;
         writeln ('anda ingin mengulang lagi?(Y/T) '); readln(d);
         until (d in ['T','t']);
         end;




                  procedure bangun_ruang;
                  begin
                  clrscr;
                  repeat
                  writeln('========kalkulator 3D========');
                  writeln('      1.kubus                     ');
                  writeln('      2.balok             ');
                  writeln('      3.menu sebelumnya             ');
                  writeln('pilih menu :'); readln(a);
                  case a of
                  1 :
                  begin
                  repeat
                  clrscr;
                  write('masukkan sisi :');readln(s);
                  kbs:=s*s*s;
                  writeln ('jumlah kubus : ' ,kbs);
                   writeln;
                   write('anda ingin mengulang? (Y/T)');readln(ulang);
                   until upcase(ulang)='T';
                  end;
                  2 :
                  begin
                 repeat
                 clrscr;
                  write('masukkan panjang :');readln(p);
                  write('masukkan lebar :');readln(l);
                  write('masukkan tinggi :');readln(t);
                  blok:=p*l*t;
                  writeln ('jumlah balok : ' ,blok);
                   writeln;
                   write('anda ingin mengulang? (Y/T)');readln(ulang);
                   until upcase(ulang)='T';
                   end;
                  3 :
                   exit
                   else
                   writeln('menu yang anda masukkan salah');
                   end;
                   writeln;
                   writeln ('anda ingin mengulang lagi?(Y/T) '); readln(d);

                   until (d in ['T','t']);
                   end;



begin
repeat
clrscr;
writeln('==========Menu Utama==========');
writeln('    1.kalkulator sederhana    ');
writeln('    2.kalkulator 2D           ');
writeln('    3.kalkulator 3D           ');
writeln('    4.exit                    ');
writeln(' pilih menu      :');readln(i);
case i of
1:begin
sederhana;
end;
2:begin
kalkulatorkedua;
end;
3:begin
bangun_ruang;
end;
4: exit
else
writeln('menu yang dimasukkan salah');
end;
clrscr;
until i=3;
readkey;
end.