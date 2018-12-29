# -*- coding: utf-8 -*-
import os
import time
import sys

#os.system('conda install lightgbm')

try:
    if sys.argv[1].split('.')[-1]!='zip':
        #print('Only *.py files are accepted!')
        print('Only updating index.html from csv file...')
        out = os.popen('sudo csvtotable -o -p -vs -1 -h 60% -c Ranking feima/update_results_new.csv tmp.html').readlines()
        f = open('tmp.html','r').readlines()
        f[3] = f[3]+'<link rel="icon" href="xh_ico.ico" type="img/x-ico" />\n'
        f[7] ='<caption></caption>\n'
        f = f[:-2]+['.footer{position:fixed; bottom:0; width:100%; text-align:center;}\n','</style>\n','<form action="upload.php" method="post" enctype="multipart/form-data">\n', '<input type="file" name="file" id="file" style="margin-left:570px"/>\n', '<input type="submit" value="Upload" name="submit" accept=".py"/>\n', '</form>\n', '</body>\n', '<div class="footer"><img src="tbsi.png" height="auto" width="500px"/></div>\n'] + f[-1:]
        with open('index.html','w') as r:
            r.writelines(f)

    else:
        if False:
            print('System busy! Please try again later!')
        else:
            name = sys.argv[1].split('.')[0].split('/')[-1]
            key = name.split('_')[0]
            out = os.popen('sudo docker run --name %s --rm -v /var/www/html/information_theory/feima:/var/www/html/information_theory/feima python36ml_it:v1 python /var/www/html/information_theory/feima/read_data_compute_gain_NEW_NEW.py %s >> %s 2>&1'%(key, sys.argv[1], '/var/www/html/information_theory/log/'+ name +'.txt')).readlines()
            
            
            print('<br>'.join(out))
            out = os.popen('sudo csvtotable -o -p -vs -1 -h 60% -c Ranking feima/update_results_new.csv tmp.html').readlines()
            f = open('tmp.html','r').readlines()
            f[3] = f[3]+'<link rel="icon" href="xh_ico.ico" type="img/x-ico" />\n'
            f[7] ='<caption></caption>\n' 
            f = f[:-2]+['.footer{position:fixed; bottom:0; width:100%; text-align:center;}\n','</style>\n','<form action="upload.php" method="post" enctype="multipart/form-data">\n', '<input type="file" name="file" id="file" style="margin-left:570px"/>\n', '<input type="submit" value="Upload" name="submit" accept=".py"/>\n', '</form>\n', '</body>\n', '<div class="footer"><img src="tbsi.png" height="auto" width="500px"/></div>\n'] + f[-1:]
            with open('index.html','w') as r:
                r.writelines(f)
except Exception as e:
    print(e)

