package example;

public class Remote {
	Command[] onCommands;
	Command[] offCommands;

	public Remote() {
		onCommands = new Command[7];
		offCommands = new Command[7];

		for (int i = 0; i < 7; i++) {
			onCommands[i] = new DoNothingCommand();
			offCommands[i] = new DoNothingCommand();
		}
	}

	public void setCommands(int index, Command onCommand, Command offCommand) {
		onCommands[index] = onCommand;
		offCommands[index] = offCommand;
	}

	public void onCommandPushed(int index) {
		onCommands[index].execute();
	}

	public void offCommandPushed(int index) {
		offCommands[index].execute();
	}
}