import csv

def process_row(row, firstrow):
    assert(len(row) == len(firstrow))
    result = {}
    for i in range(len(row)):
        result[firstrow[i]] = row[i]
    print(result)

def process_csv(filename):
    with open('../' + filename + '.csv', newline='') as f:
        reader = csv.reader(f)
        firstrow = None
        for row in reader:
            if firstrow == None:
                firstrow = row
            elif row != []:
                process_row(row, firstrow)
process_csv('assault')
