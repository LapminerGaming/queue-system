@echo off
setlocal enabledelayedexpansion

set "whitelist_players=Mightis lethanhdat11_11 Nguynkhsuyy Hydrix_Mc TT_LunarCycle shorkkk12345 Hungg444 GauKa anhbu258 IzuneeK Anhh_Nguyenn Toan_DonPhuong _miloXD_ ChilliRed_Gaming closer113 namyehdu112 phammanhha NguyenLeQuyen Creepper_GoodTV TheHungVietNam lamg1502 Huy5454 0rcas KokoMelin78 Toru1341 Dkhanh123 WhiteMC190 TaolafThai poppy_vn Roontopez Jokar2310 0minhmc_1 HuskyMCPro Rimuru12102k9 chipduka Wliseetinh SITOASuu PhDatttt MinhTriMC2708 huy300474 Phuckedj EchOpp Mr_Pig2538 azruir11 Spirikou NOC19999 BWReaper1973 KiRiTo36381 wheij3_vn Chenggne NhanShadow Kayudo Kh4nhgaming PhuscMC HuskyMCPro VUFALLGAWR thangmcdz67 TSgmING beymc12 bear105227"

for %%p in (%whitelist_players%) do (
    echo whitelist add %%p
    REM gửi lệnh đến console của Minecraft server
    REM Thay thế `minecraft_server_console` bằng tên cửa sổ console của bạn
    nircmd win sendkeypress minecraft_server_console "whitelist add %%p{ENTER}"
)
