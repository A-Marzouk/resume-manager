# imports
from os import listdir
from os.path import isfile, join

# icons folder path
ICONS_PATH = "./public/images/skills_icons/"

# Get all icon file names in the folder
iconsName = [file for file in listdir(ICONS_PATH) if isfile(join(ICONS_PATH, file))]

def createIconsCopies (iconsList):
	# if lowercase filename doesn't exists I must create a copy of this.
	for name in iconsList:
		if not(name.islower()):

			file = open(join(ICONS_PATH, name.lower()), "wb")
			print("Creating a copy of %s\n"%(name))

			with open(join(ICONS_PATH, name), "rb") as f:
			    while True:
			        byte = f.read(1)
			        if not byte:
			            break
			        file.write(byte[0])
			 
createIconsCopies(iconsName)