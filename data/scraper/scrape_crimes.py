import simplejson
import csv

outfile = open('../json/crimes.json','w')

def process_row(row, firstrow, crime_name):
    assert(len(row) == len(firstrow))
    result = {}
    for i in range(len(row)):
        result[firstrow[i]] = row[i]
    result['crime_name'] = crime_name
    outfile.write(simplejson.dumps(result))

def process_csv(filename):
    with open('../' + filename + '.csv', newline='') as f:
        reader = csv.reader(f)
        firstrow = None
        for row in reader:
            if firstrow == None:
                firstrow = row
            elif row != []:
                process_row(row, firstrow, filename)
process_csv('assault')
