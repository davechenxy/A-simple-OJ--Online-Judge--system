# A simple OJ (Online Judge) system

A simple OJ (Online Judge) system based on html+PHP+Python, that allows users to upload file, score results and display the ranking.

# index page
![index.html](assets/sample1.png) 

# upload page
![upload.php](assets/sample2.png) 

# Flowchart:
![flowchart](assets/flowchart.png) 

# Description:
Users upload files through *index.html*, then files are scored by a Python script *main.py*. After the uploaded file is successfully scored, the result csv file will be updated. Lastly, the script *run.py* will convert the updated csv file into html page by using [csvtotable](https://pypi.org/project/csvtotable/) and update *index.html*. Users will be authenticated by the filename, e.g., including a secret key in the filename. 

## Further Reading:
[Sandbox](https://github.com/zhaofeng-shu33/docker-python3.6-ML)
