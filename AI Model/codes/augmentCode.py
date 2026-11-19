import cv2
import numpy as np
import random
import os

dir = r"D:\AI\ML\dissamali\data\train\White root"

def Zoom(img):
    res = cv2.resize(img,None,fx=1.1, fy=1.1, interpolation = cv2.INTER_LINEAR)
    x1=(res.shape[0]-img.shape[0])/2
    x2=(res.shape[0]-img.shape[0])/2+img.shape[0]
    y1=(res.shape[1]-img.shape[1])/2
    y2=(res.shape[1]-img.shape[1])/2+img.shape[1]
    zoomed=res[x1:x2,y1:y2]
    return zoomed

def horizontal_flip(img):
    flip = cv2.flip( img, 0 )
    return flip

def vertical_flip(img):
    flip = cv2.flip( img, 1 )
    return flip

def blur(img):
    blur = cv2.GaussianBlur(img,(5,5),0)
    return blur

def saturate(img):
    width=img.shape[1]
    height=img.shape[0]
    for i in range(width):
        for j in range(height):
            pixel= img[i, j]
            img[i, j]=pixel+20
    return img


def desatutare(img):
    width=img.shape[1]
    height=img.shape[0]
    for i in range(width):
        for j in range(height):
            pixel= img[i, j]
            img[i, j]=pixel-20
    return img

def rotateImage(image, angle):
    image_center = tuple(np.array(image.shape[1::-1]) / 2)
    rot_mat = cv2.getRotationMatrix2D(image_center, angle, 1.0)
    result = cv2.warpAffine(image, rot_mat, image.shape[1::-1], flags=cv2.INTER_LINEAR)
    return result

imageNames = os.listdir(dir)
for i in range(len(imageNames)):
    imagePath=dir+"\\"+imageNames[i]
    image=cv2.imread(imagePath)
    aug1=vertical_flip(image)
    cv2.imwrite(dir+"\\"+str(i)+"-1"+imageNames[i],aug1)
    aug2=horizontal_flip(image)
    cv2.imwrite(dir+"\\"+str(i)+"-2"+imageNames[i],aug2)
    aug3=rotateImage(image, 5)
    cv2.imwrite(dir+"\\"+str(i)+"-3"+imageNames[i],aug3)
    aug4=rotateImage(image, -5)
    cv2.imwrite(dir+"\\"+str(i)+"-4"+imageNames[i],aug4)
print("processed images : ",i*4)
print("Total Images : ",i*3+len(imageNames))