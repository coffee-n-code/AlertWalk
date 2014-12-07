import simplejson
import csv

stuff = []
outfile = open('../crimes.csv', 'w')

def process_row(row, firstrow, crime_name):
    assert(len(row) == len(firstrow))
    result = {}
    for i in range(len(row)):
        if firstrow[i] != "":
            result[firstrow[i]] = row[i]
    #result['crime_name'] = crime_name
    for k in result:
        if k >= '2004' and k <= '2011':
            amount = result[k]
            year = k
            neighbourhood_id = result['Number']
            neighbourhood = result['Name']
            outfile.write(neighbourhood_id + ",\"" + neighbourhood + '\",\"' + crime_name + "\"," + year + "," + amount + "\n")
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
process_csv('assault','assault')
process_csv('breakandenter','break and enter')
process_csv('drug-charges','drug charges')
process_csv('murder','murder')
process_csv('robbery','robbery')
process_csv('sexualassault','sexual assault')
process_csv('stolen-cars','stolen vehicle')
process_csv('theft','theft $5000+')

outfile = open('../json/crimes.json','w')
outfile.write(simplejson.dumps(stuff))
