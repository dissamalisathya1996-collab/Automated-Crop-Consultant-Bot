import keras
from keras.layers.core import Dense,Flatten
from keras.layers.core import Dropout
from keras.models import Model
from keras.optimizers import Adam
from keras.layers import Input
from keras.preprocessing.image import ImageDataGenerator
import matplotlib.pyplot as plt
from keras.callbacks import ModelCheckpoint


train_path =r"D:\AI\ML\dissamali\data\train"
valid_path =r"D:\AI\ML\dissamali\data\validate"

train_batches=ImageDataGenerator().flow_from_directory(train_path,target_size=(224,224),classes=['Birds Eye spot','Black rot','Blister Blight','Leaf Spot','Red root','White root'],batch_size=10)
valid_batches=ImageDataGenerator().flow_from_directory(valid_path,target_size=(224,224),classes=['Birds Eye spot','Black rot','Blister Blight','Leaf Spot','Red root','White root'],batch_size=10)

baseModel = keras.applications.vgg16.VGG16(weights="imagenet", include_top=False,input_tensor=Input(shape=(224,224, 3)))
print(baseModel.summary())

headModel = baseModel.output
headModel = Flatten(name="flatten")(headModel)
headModel = Dense(256, activation="relu")(headModel)
headModel = Dense(256, activation="relu")(headModel)
headModel = Dense(6, activation="softmax")(headModel)

model = Model(inputs=baseModel.input, outputs=headModel)
for layer in baseModel.layers:
	layer.trainable = False


filepath=r"D:\AI\ML\dissamali\models\weights-improvement-{epoch:02d}-{val_acc:.2f}.h5"
checkpoint = ModelCheckpoint(filepath, monitor='val_acc', verbose=1, save_best_only=True, mode='max')
callbacks_list = [checkpoint]

model.compile(Adam(lr=0.000001),loss='categorical_crossentropy',metrics=['accuracy'])
results=model.fit_generator(train_batches,steps_per_epoch=106,callbacks=callbacks_list,validation_data=valid_batches,validation_steps=3,epochs=100,verbose=1)

plt.plot(results.history['loss'])
plt.plot(results.history['val_loss'])
plt.title('model loss')
plt.ylabel('loss')
plt.xlabel('epoch')
plt.legend(['train', 'validation'], loc='upper left')
plt.show()