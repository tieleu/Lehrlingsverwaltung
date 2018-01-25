package example;

public class Tv {
	private boolean isOn = false;
	private int volume = 0;

	public void on() {
		isOn = true;
		System.out.println(this);
	}

	public void off() {
		isOn = false;
		System.out.println(this);
	}

	public void setVolume(int volume) {
		this.volume = volume;
		System.out.println(this);
	}

	public String toString() {
		return "[Tv is on= " + isOn + ", volume= " + volume + "]";
	}
}