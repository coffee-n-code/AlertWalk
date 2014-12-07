import re

pat_way = re.compile('<way id=".*" timestamp="[^"]*" version="0" user="" actor="0">')
pat_boundingbox = re.compile('<BoundingBox>')
pat_topright = re.compile('<topright lon="[^"]*" lat="[^"]*"/>')
pat_bottomleft = re.compile('<bottomleft lon="[^"]*" lat="[^"]*"/>')
pat_slashboundingbox = re.compile('</BoundingBox>') 
pat_nd = re.compile('<nd ref="([^"]*)"/>')
pat_tag = re.compile('<tag k="([^"]*)" v="([^"]*)"/>')
pat_slashway = re.compile('</way>')
pat_node = re.compile('<node id="([^"]*)" timestamp="[^"]*" version="0" user="" actor="0" lon="([^"]*)" lat="([^"]*)"/>')

f = open('boundaries.osm')
nodes = {}
ways = {}

def process_node(line):
    m = pat_node.match(line)
    if not m: return None
    return (int(m.group(1)), float(m.group(2)), float(m.group(3)))

def process_nodes(first, last):
    result = []
    for i in range(first, last-1, -1):
        (nid, lon, lat) = process_node()
        assert(nid == i)
        result.append((lon,lat))
    return result

def process_tag():
    line = f.readline().strip()
    m = pat_tag.match(line)
    if not m: return None
    return (m.group(1), m.group(2))
    
def process_tags():
    (k, v_cd) = process_tag()
    assert(k == '_AREA_S_CD_')
    v_cd = int(v_cd)
    (k, v_name) = process_tag()
    suffix = ' (' + str(v_cd) + ')'
    assert(v_name.endswith(suffix))
    v_name = v_name[0:-len(suffix)]
    assert(k == '_AREA_NAME_')
    return (v_cd, v_name)

def process_nd():
    line = f.readline().strip()
    m = pat_nd.match(line)
    if not m: return None
    return int(m.group(1))

def ignore_boundingbox():
    line = f.readline().strip()
    m = pat_boundingbox.match(line)
    assert(m)

    line = f.readline().strip()
    m = pat_topright.match(line)
    assert(m)

    line = f.readline().strip()
    m = pat_bottomleft.match(line)
    assert(m)

    line = f.readline().strip()
    m = pat_slashboundingbox.match(line)
    assert(m)

def process_way(line):
    m = pat_way.match(line)
    if not m: return None

    ignore_boundingbox()

    ndrefs = []
    while 1:
        ndref = process_nd()
        if ndrefs != [] and ndref == ndrefs[0]: break
        ndrefs.append(ndref)

    (cd, name) = process_tags()

    line = f.readline().strip()
    m = pat_slashway.match(line)
    if not m: return 0

    return (cd, name, ndrefs)

def process_node_or_way():
    line = f.readline().strip()
    w = process_way(line)
    if w != None:
        ways[w[0]] = (w[1], w[2])
        return 1
    else:
        n = process_node(line)
        if n != None:
            nodes[n[0]] = n[1]
            return 1
        else:
            return 0

header = f.readline().strip()
assert(header == '<?xml version="1.0" encoding="UTF-8"?>')
header = f.readline().strip()
assert(header == '<osm version="0.6" generator="Merkaartor 0.18">')
while 1:
    if not process_node_or_way():
        break

for wayid in ways.keys():
    way = ways[wayid]
    coordlist = []
    for i in range(len(way[1])):
        nodeid = way[1][i]
        coordlist.append(nodes[nodeid])
    ways[wayid] = (way[0], coordlist)
print ways
