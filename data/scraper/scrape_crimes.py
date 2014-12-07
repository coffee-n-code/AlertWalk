import simplejson
import csv

stuff = []

def process_row(row, firstrow, crime_name):
    assert(len(row) == len(firstrow))
    result = {}
    for i in range(len(row)):
        if firstrow[i] != "":
            result[firstrow[i]] = row[i]
    result['crime_name'] = crime_name
    stuff.append(result)

def process_csv(filename, crime_name):
    with open('../' + filename + '.csv', newline='') as f:
        reader = csv.reader(f)
        firstrow = None
        for row in reader:
            if firstrow == None:
                firstrow = row
            elif row != []:
                process_row(row, firstrow, crime_name)
process_csv('assault','Assault')
process_csv('breakandenter','Breaking and entering')
process_csv('drug-charges','Drug charges')
process_csv('murder','Murder')
process_csv('robbery','Robbery')
process_csv('sexualassault','Sexual assault')
process_csv('stolen-cars','Stolen cars')
process_csv('theft','Theft')

outfile = open('../json/crimes.json','w')
outfile.write(simplejson.dumps(stuff))
