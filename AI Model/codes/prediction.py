import cv2
from keras.models import load_model
import numpy as np

model=load_model(r'D:\AI\ML\dissamali\models\trainedModel.h5')
imgDir=r'D:\AI\ML\dissamali\test\resdroot.jpg'
saveDir=r'D:\AI\ML\dissamali\prediction.txt'
saveDocDir=r'D:\AI\ML\dissamali\remedy.txt'


img=cv2.imread(imgDir)
img=cv2.resize(img,(224,224))
img=np.reshape(img,(1,224,224,3))
pred=model.predict(img)
idx=np.argmax(pred)
pred= None
if(idx==0):
    pred='Birds Eye spot'
    doc= r"D:\AI\ML\dissamali\data\birdseyespot.txt"
elif(idx==1):
    pred='Black rot'
    doc= r"D:\AI\ML\dissamali\data\blackrot.txt"
elif(idx==2):
    pred='Blister Blight'
    doc= r"D:\AI\ML\dissamali\data\blisterblight.txt"
elif(idx==3):
    pred='Leaf Spot'
    doc= r"D:\AI\ML\dissamali\data\leafspot.txt"
elif(idx==4):
    pred='Red root'
    doc= r"D:\AI\ML\dissamali\data\redroot.txt"
elif(idx==5):
    pred='White root'
    doc= r"D:\AI\ML\dissamali\data\whiteroot.txt"
print('prediction : ',pred)
f= open(saveDir,"w+")
f.write(str(pred))
f.close() 

f = open(doc, 'r')
file_contents = f.read()
print (file_contents)
f.close()

f= open(saveDocDir,"w+")
f.write(file_contents)
f.close() 