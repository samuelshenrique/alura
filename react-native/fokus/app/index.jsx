import { Button, Image, StyleSheet, View } from "react-native";

export default function Index() {
  return (
    <View
      style={styles.container}
    >
      <Image style={styles.image} source={require('./pomodoro.png')} />
      <View style={styles.actions}>
        <Button style={styles.button} title="Começar" />
      </View>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    backgroundColor: '#021123',
    flex: 1,
    gap: 40,
    justifyContent: "center",
    alignItems: "center",
  },
  text: {
    color: '#FFF'
  },
  actions: {
    paddingHorizontal: 24,
    paddingVertical: 24,
    backgroundColor: '#14448080',
    width: '80%',
    borderRadius: 32,
    borderWidth: 2,
    borderColor: '#144480'
  },
  image: {
  },
  button: {
    backgroundColor: '#B872FF',
    borderRadius: 32
  }
})